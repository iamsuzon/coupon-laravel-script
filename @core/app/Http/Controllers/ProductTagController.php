<?php

namespace App\Http\Controllers;

use App\Helpers\FlashMsg;
use App\Helpers\LanguageHelper;
use App\Language;
use App\ProductCategory;
use App\ProductTag;
use Illuminate\Http\Request;

class ProductTagController extends Controller
{
    public $languages = null;
    private const BASE_PATH = 'backend.';
    public function __construct()
    {
        if ($this->languages === null){
            $this->languages =  $all_languages = Language::all();
        }
        //Product Category
        $this->middleware('auth:admin');
        $this->middleware('permission:product-tag-list|product-tag-create|product-tag-edit|product-tag-delete',['only' => ['index']]);
        $this->middleware('permission:product-tag-create',['only' => ['new_tag']]);
        $this->middleware('permission:product-tag-edit',['only' => ['update_tag']]);
        $this->middleware('permission:product-tag-delete',['only' => ['bulk_action','delete_category_all_lang']]);
    }

    public function index(Request $request){
        $all_category = ProductTag::select(['id','name','status'])->get();
        return view(self::BASE_PATH.'product.tag')->with([
            'all_category' => $all_category,
            'default_lang' => $request->lang ?? LanguageHelper::default_slug(),
        ]);
    }

    public function new_tag(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|string|max:191|unique:product_tags',
            'status' => 'required|string|max:191',
        ]);

        $tag = new ProductTag();
        $tag
            ->setTranslation('name',$request->lang, purify_html($request->name));
        $tag->status = $request->status;
        $tag->save();
        return redirect()->back()->with(FlashMsg::item_new('Product Tag Added'));
    }

    public function update_tag(Request $request){
        $this->validate($request,[
            'name' => 'required|string|max:191|unique:product_tags',
            'status' => 'required|string|max:191',
        ]);

        $tag =  ProductTag::findOrFail($request->id);
        $tag
            ->setTranslation('name',$request->lang, purify_html($request->name));
        $tag->status = $request->status;
        $tag->save();

        return back()->with(FlashMsg::item_update());
    }

    public function delete_tag_all_lang(Request $request,$id){

//        if (Blog::where('category_id',$id)->first()){
//            return redirect()->back()->with([
//                'msg' => __('You can not delete this category, It already associated with a post...'),
//                'type' => 'danger'
//            ]);
//        }
        $tag =  ProductTag::where('id',$id)->first();
        $tag->delete();

        return back()->with(FlashMsg::item_delete());
    }

    public function bulk_action(Request $request){
        ProductTag::whereIn('id',$request->ids)->delete();
        return response()->json(['status' => 'ok']);
    }
}
