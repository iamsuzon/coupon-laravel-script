<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Helpers\FlashMsg;
use App\Helpers\LanguageHelper;
use App\Language;
use App\Page;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PagesController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:pages-list|pages-edit|pages-delete',['only' => ['index']]);
        $this->middleware('permission:pages-create',['only' => ['new_page','store_new_page']]);
        $this->middleware('permission:pages-edit',['only' => ['edit_page','update_page']]);
        $this->middleware('permission:pages-delete',['only' => ['bulk_action','delete_page_lang_all']]);
    }

    public function index(Request $request){
        $all_pages = Page::latest()->get();
        return view('backend.pages.page.index')->with([
            'all_pages' => $all_pages,
            'default_lang' => $request->lang ?? LanguageHelper::default_slug(),
        ]);
    }
    public function new_page(Request $request){

        return view('backend.pages.page.new')->with([
            'default_lang' => $request->lang ?? LanguageHelper::default_slug(),
        ]);
    }
    public function store_new_page(Request $request)
    {
        $this->validate($request,[
            'title' => 'required',
            'page_content' => 'nullable',
            'status' => 'required',
            'slug' => 'nullable',
            'visibility' => 'nullable|string',
        ]);

        $page = new Page();
        $page
            ->setTranslation('title',$request->lang, purify_html($request->title))
            ->setTranslation('page_content',$request->lang, $request->page_content)
            ->save();

        $slug = !empty($request->slug) ? $request->slug : Str::slug($request->title);
        $slug_check = Page::where(['slug' => $slug])->count();
        $slug = $slug_check > 0 ? $slug.'-6' : $slug;

        $page->slug = purify_html($slug);
        $page->status = $request->status;
        $page->visibility = $request->visibility;
        $page->page_builder_status = $request->page_builder_status;
        $page->layout = $request->layout;
        $page->sidebar_layout = $request->sidebar_layout;
        $page->page_class = $request->page_class;
        $page->navbar_variant = $request->navbar_variant;
        $page->footer_variant = $request->footer_variant;
        $page->breadcrumb_status = $request->breadcrumb_status;
        $page->widget_style = $request->widget_style;

        $Metas = [
            'meta_title'=> purify_html($request->meta_title),
            'meta_tags'=> purify_html($request->meta_tags),
            'meta_description'=> purify_html($request->meta_description),

            'facebook_meta_tags'=> purify_html($request->facebook_meta_tags),
            'facebook_meta_description'=> purify_html($request->facebook_meta_description),
            'facebook_meta_image'=> $request->facebook_meta_image,

            'twitter_meta_tags'=> purify_html($request->twitter_meta_tags),
            'twitter_meta_description'=> purify_html($request->twitter_meta_description),
            'twitter_meta_image'=> $request->twitter_meta_image,
        ];

        $page->save();
        $page->meta_data()->create($Metas);

        return back()->with(FlashMsg::item_new('Page Created Successfully'));
    }

    public function edit_page(Request $request,$id){
        $page_post = Page::find($id);
        return view('backend.pages.page.edit')->with([
            'page_post' => $page_post,
            'default_lang' => $request->lang ?? LanguageHelper::default_slug(),
        ]);
    }

    public function update_page(Request $request,$id){

        $this->validate($request,[
            'title' => 'required',
            'page_content' => 'nullable',
            'status' => 'required',
            'slug' => 'nullable',
            'visibility' => 'nullable|string',
        ]);

        $page = Page::find($id);
            $page
             ->setTranslation('title',$request->lang, purify_html($request->title))
             ->setTranslation('page_content',$request->lang, $request->page_content)
             ->save();

        $slug = !empty($request->slug) ? $request->slug : Str::slug($request->title);
        $slug_check = Page::where(['slug' => $slug])->count();
        $slug = $slug_check > 1 ? $slug.'-7' : $slug;

        if (LanguageHelper::default_slug() === $request->lang){
            $page->slug = purify_html($slug);
        }

        $page->status = $request->status;
        $page->visibility = $request->visibility;
        $page->page_builder_status = $request->page_builder_status;
        $page->layout = $request->layout;
        $page->sidebar_layout = $request->sidebar_layout;
        $page->sidebar_layout_two_status = $request->sidebar_layout_two_status;
        $page->sidebar_layout_two = $request->sidebar_layout_two;
        $page->page_class = $request->page_class;
        $page->navbar_variant = $request->navbar_variant;
        $page->footer_variant = $request->footer_variant;
        $page->breadcrumb_status = $request->breadcrumb_status;
        $page->widget_style = $request->widget_style;

        $meta=  $page->meta_data()->first();
        $meta
            ->setTranslation('meta_title',$request->lang, purify_html($request->meta_title))
            ->setTranslation('meta_tags',$request->lang, purify_html($request->meta_tags))
            ->setTranslation('meta_description',$request->lang, purify_html($request->meta_description))
            ->setTranslation('facebook_meta_tags',$request->lang, purify_html($request->facebook_meta_tags))
            ->setTranslation('facebook_meta_description',$request->lang, purify_html($request->facebook_meta_description))
            ->setTranslation('facebook_meta_image',$request->lang, $request->facebook_meta_image)
            ->setTranslation('twitter_meta_tags',$request->lang, purify_html($request->twitter_meta_tags))
            ->setTranslation('twitter_meta_description',$request->lang, purify_html($request->twitter_meta_description))
            ->setTranslation('twitter_meta_image',$request->lang, $request->twitter_meta_image)
            ->save();

        $page->save();
        return back()->with(FlashMsg::item_new('Page Updated Successfully'));
    }

    public function delete_page_lang_all($id){
       $page = Page::find($id);
       $page->delete();
       $page->meta_data()->delete();

        return redirect()->back()->with(FlashMsg::item_delete());
    }

    public function bulk_action(Request $request){

        $all = Page::findOrFail($request->ids);
        foreach($all as $item){
            $item->delete();
            $item->meta_data()->delete();
        }
        return response()->json(['status' => 'ok']);
    }



}
