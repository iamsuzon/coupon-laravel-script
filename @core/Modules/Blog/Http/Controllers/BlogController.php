<?php

namespace Modules\Blog\Http\Controllers;
use App\Actions\Blog\BlogAction;
use App\Blog;
use App\BlogCategory;
use App\BlogComment;
use App\Helpers\DataTableHelpers\General;
use App\Helpers\FlashMsg;
use App\Helpers\LanguageHelper;
use App\Http\Requests\BlogInsertRequest;
use App\Http\Requests\BlogUpdateRequest;
use App\Language;
use App\Mail\BasicMail;
use App\MetaData;
use App\Tag;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Mail;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;

class BlogController extends Controller
{
    private const BASE_PATH = 'blog::backend.';

    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('permission:blog-list|blog-edit|blog-delete',['only' => ['index','blog_approve']]);
        $this->middleware('permission:blog-create',['only' => ['new_blog','store_new_blog']]);
        $this->middleware('permission:blog-edit',['only' => ['clone_blog','edit_blog','update_blog']]);
        $this->middleware('permission:blog-delete',['only' => ['delete_blog','bulk_action_blog','delete_blog_all_lang']]);
        $this->middleware('permission:blog-single-settings',['only' => ['blog_single_page_settings','update_blog_single_page_settings']]);
        $this->middleware('permission:page-settings-blog-page-manage',['only' => ['blog_area','update_blog_area']]);
        //For Trash
        $this->middleware('permission:blog-trashed-list|blog-trashed-edit|blog-trashed-delete',['only' => ['trashed_blogs','blog_approve']]);
        $this->middleware('permission:blog-trashed-restore',['only' => ['restore_trashed_blog']]);
        $this->middleware('permission:blog-trashed-delete',['only' => ['delete_trashed_blog','trashed_bulk_action_blog']]);
    }

    public function index(Request $request){

        $default_lang = $request->lang ?? LanguageHelper::default_slug();

        if ($request->ajax()){

            $data = Blog::usingLocale($default_lang)->select('*')->orderBy('id','desc')->get();
            return DataTables::of($data)
                ->addIndexColumn()

                ->addColumn('checkbox',function ($row){
                    return General::bulkCheckbox($row->id);
                })

                ->addColumn('author',function ($row){
                    return $row->author_data()->name ?? __('Anonymous');
                })

                ->addColumn('views',function ($row){
                    return $row->views ?? 0 ;
                })

                ->addColumn('title',function ($row) use($default_lang){
                    $video_post = $row->video_url ? '<span class="badge badge-primary ml-2">'.__("Video Post").'</span>' : '';
                    $gallery_post = strlen($row->image_gallery) ? '<span class="badge badge-warning ml-2">'.__("Gallery Post").'</span>' : '';

                    return $row->getTranslation('title',$default_lang,true) . $video_post .$gallery_post;
                })

                ->addColumn('image',function ($row) use($default_lang) {
                    return General::image($row->image);
                })

                ->addColumn('category_id',function ($row) use($default_lang ){
                    $color = ['badge-primary', 'badge-danger', 'badge-warning', 'badge-info', 'badge-success'];
                    return '<span class="badge badge-danger">'.optional($row->category)->getTranslation('title',$default_lang).'</span>';
                })

                ->addColumn('status',function ($row){
                    return General::statusSpan($row->status);
                })

                ->addColumn('date',function ($row){
                    return date_format($row->created_at,'d-M-Y');
                })


                ->addColumn('action', function($row)use($default_lang){
                    $action = '';
                    $action .= General::viewIcon(route('frontend.blog.single',$row->slug));
                    $admin = auth()->guard('admin')->user();
                    if ($admin->can('blog-delete')){
                        $action .= General::deletePopover(route('admin.blog.delete.all.lang',$row->id));
                    }
                    if ($admin->can('blog-edit')){
                        $action .= General::editIcon(route('admin.blog.edit',$row->id).'?lang='.$default_lang);
                        $action .= General::cloneIcon(route('admin.blog.clone'),$row->id);
                    }

                    $action .= General::viewComments(route('admin.blog.comments.view',$row->id),$row->id);
                    
                  if ($row->created_by == 'user' && $row->status == 'pending'){
                        $action .= General::blogApprove($row->id);
                    }

                    return $action;
                })
                ->rawColumns(['action','checkbox','image','status','category_id','title'])
                ->make(true);
        }

        return view(self::BASE_PATH.'blog.index',compact('default_lang'));
    }
    public function new_blog(Request $request){

        $all_category = BlogCategory::all();
        $all_tags = Tag::all();

        return view(self::BASE_PATH.'blog.new')->with([
            'all_category' => $all_category,
            'all_tags' => $all_tags,
            'default_lang' => $request->lang ?? LanguageHelper::default_slug(),
        ]);
    }
    public function store_new_blog(BlogInsertRequest $request, BlogAction $blogAction) : RedirectResponse
    {
        $blogAction->store_execute($request);
        return back()->with(FlashMsg::item_new('Blog Created Successfully..'));
    }

    public function edit_blog(Request $request,$id){
        $blog_post = Blog::find($id);
        $all_category = BlogCategory::select(['id','title'])->get();
        $all_tags = Tag::select(['id','name'])->get();
        return view(self::BASE_PATH.'blog.edit')->with([
            'all_category' => $all_category,
            'all_tags' => $all_tags,
            'blog_post' => $blog_post,
            'default_lang' => $request->lang ?? LanguageHelper::default_slug(),
        ]);
    }

    public function update_blog(BlogUpdateRequest $request, BlogAction $blogAction,$id) : RedirectResponse
    {
        $blogAction->update_execute($request,$id);
        return back()->with(FlashMsg::item_update('Blog Updated Successfully..'));
    }

    public function view_analytics($id){
        $blog = Blog::find($id);
        return view(self::BASE_PATH.'blog.view-analytics')->with(['blog' => $blog]);
    }

    public function view_data_monthly(){
        $all_data_by_view = Blog::select('views')
            ->whereDate('created_at', '>', Carbon::now()->subDays(30))
            ->get()
            ->groupBy( 'views');
        return $this->similler_data($all_data_by_view);
    }

    private function similler_data($data){
        $labels = [];
        $counts = [];
        foreach ($data as $name => $item){
            $labels[] = $name;
            $counts[] = $item->count();
        }

        return response()->json( [
            'labels' => $labels,
            'data' => $counts
        ]);

    }



    public function delete_blog_all_lang(Request $request,BlogAction $action, $id){
        $action->delete_execute($request,$id,'delete');
        return redirect()->back()->with(FlashMsg::item_delete('Blog Post Deleted Successfully..'));
    }

    public function bulk_action_blog(Request $request){
        Blog::whereIn('id',$request->ids)->delete();
        return response()->json(['status' => 'ok']);
    }

    public function clone_blog(Request $request, BlogAction $blogAction)
    {
        $blogAction->clone_blog_execute($request);
        return back()->with(FlashMsg::item_clone('Blog Cloned..'));
    }

    public function get_tags_by_ajax(Request $request)
    {
        $query = $request->get('query');
        $filterResult = Tag::Where('name', 'LIKE', '%' . $query . '%')->get();
        $html_markup = '';
        $result = [];
        foreach ($filterResult as $data) {

          $fdata = $data->getTranslation('name',get_user_lang());
            array_push($result,$fdata);
        }
        return response()->json(['result' => $result]);
    }

    public function blog_approve(Request $request)
    {
        $request->validate([
            'id' => 'required'
        ]);
        $msg = __('Approve Success');
        $blog = Blog::find($request->id);
        $blog->status = 'publish';
        $blog->save();

        if ($blog->user->email){
            try{
                Mail::to($blog->user->email)->send(new BasicMail([
                    'subject' => __('your blog is approve'),
                    'message' => __('congrats').'<br>'.__('your blog is now live'),
                    'message' => '<a href="'.route('frontend.blog.single',$blog->slug).'">'.__('Click Here').'</a>',
                ]));
            }catch(\Exception $e){
                return back()->with(['msg' => $msg, 'type' => 'success']);
                return redirect()->back()->with(['msg' => $msg.' '.__(',notification mail send failed'), 'type' => 'success']);
            }

            $msg .= ' '.__(',notification mail send');
        }


        return back()->with(['msg' => $msg, 'type' => 'success']);
    }

    public function view_comments($id)
    {
        $blog_comments = Blog::find($id);
        return view(self::BASE_PATH.'blog.comments',compact('blog_comments'));
    }

    public function delete_all_comments(Request $request,$id){
        $category =  BlogComment::where('id',$id)->first();
        $category->delete();
        return back()->with(FlashMsg::item_delete());
    }

    public function bulk_action_comments(Request $request){
        BlogComment::whereIn('id',$request->ids)->delete();
        return response()->json(['status' => 'ok']);
    }


    //=============================== FORCE DELETE AND RESTORE FUNCTIONS =================================

    public function trashed_blogs(Request $request){
        $trashed_blogs = Blog::onlyTrashed()->get();
        $default_lang = $request->lang ?? LanguageHelper::default_slug();
        return view(self::BASE_PATH.'blog.trashed',compact('trashed_blogs','default_lang'));
    }

    public function restore_trashed_blog($id){
        Blog::withTrashed()->find($id)->restore();
        return back()->with(FlashMsg::settings_update('Trashed Blog Restored Successfully..'));
    }

    public function delete_trashed_blog(Request $request, BlogAction $act, $id){
        $act->delete_execute($request,$id,'trashed_delete');
        return back()->with(FlashMsg::item_delete('Blog Post Deleted Forever'));
    }

    public function trashed_bulk_action_blog(Request $request){
         MetaData::whereIn('meta_taggable_id',$request->ids)->delete();
         Blog::onlyTrashed()->whereIn('id',$request->ids)->forceDelete();

        return response()->json(['status' => 'ok']);
    }


    public function blog_single_page_settings()
    {
        $all_languages = Language::all();
        return view(self::BASE_PATH.'blog.blog-single',compact('all_languages'));
    }

    public function update_blog_single_page_settings(Request $request)
    {
        $all_language = Language::all();
        foreach ($all_language as $lang) {
            $request->validate([
                'blog_single_page_'.$lang->slug.'_related_post_title' => 'nullable|string',
                'blog_single_page_comments_'.$lang->slug.'_text' => 'nullable|string',
                'blog_single_page_comments_'.$lang->slug.'_title_text' => 'nullable|string',
                'blog_single_page_comments_button_'.$lang->slug.'_text' => 'nullable|string',
                'single_blog_page_comment_avatar_image' => 'nullable|string',
                'blog_single_page_login_title_'.$lang->slug.'_text' => 'nullable|string',
                'blog_single_page_login_button_'.$lang->slug.'_text' => 'nullable|string',

            ]);
            $fields = [
                'blog_single_page_'.$lang->slug.'_related_post_title',
                'blog_single_page_comments_'.$lang->slug.'_text',
                'blog_single_page_comments_'.$lang->slug.'_title_text',
                'blog_single_page_comments_button_'.$lang->slug.'_text',
                'blog_single_page_login_title_'.$lang->slug.'_text',
                'blog_single_page_login_button_'.$lang->slug.'_text',
                'single_blog_page_comment_avatar_image'

            ];
            foreach ($fields as $field) {
                if ($request->has($field)) {
                    update_static_option($field, $request->$field);
                }
            }

        }
        return redirect()->back()->with(FlashMsg::settings_update());
    }
}
