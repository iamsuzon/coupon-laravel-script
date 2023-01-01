<?php

namespace App\Http\Controllers;

use App\BlogCategory;
use App\Helpers\FlashMsg;
use App\Helpers\LanguageHelper;
use App\Language;
use App\Product;
use App\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductCategoryController extends Controller
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
        $this->middleware('permission:product-category-list|product-category-create|product-category-edit|product-category-delete',['only' => ['index']]);
        $this->middleware('permission:product-category-create',['only' => ['new_category']]);
        $this->middleware('permission:product-category-edit',['only' => ['update_category']]);
        $this->middleware('permission:product-category-delete',['only' => ['bulk_action','delete_category_all_lang']]);
    }

    public function index(Request $request){
        $all_category = ProductCategory::select(['id','title','slug','image','status'])->get();
        return view(self::BASE_PATH.'product.category')->with([
            'all_category' => $all_category,
            'default_lang' => $request->lang ?? LanguageHelper::default_slug(),
        ]);
    }

    public function new_category(Request $request){
        $this->validate($request,[
            'title' => 'required|string|max:191|unique:product_categories',
            'image' => 'required|string',
            'status' => 'required|string|max:191',
        ]);

        $category = new ProductCategory();
        $category
            ->setTranslation('title',$request->lang, purify_html($request->title));

        $slug = !empty($request->slug) ? Str::slug($request->slug) : Str::slug($request->title);
        $slug_check = ProductCategory::where(['slug' => $slug])->count();
        $slug = $slug_check > 0 ? $slug.'-2' : $slug;

        $category->slug = purify_html($slug);

        $category->image = $request->image;
        $category->status = $request->status;
        $category->save();
        return redirect()->back()->with(FlashMsg::item_new('Product Category Added'));
    }

    public function update_category(Request $request){
        $this->validate($request,[
            'title' => 'required|string|max:191|unique:product_categories',
            'image' => 'required|string',
            'status' => 'required|string|max:191',
        ]);

        $category =  ProductCategory::findOrFail($request->id);
        $category
            ->setTranslation('title',$request->lang, purify_html($request->title));

        $slug = !empty($request->slug) ? Str::slug($request->slug) : Str::slug($request->title);
        $slug_check = Product::where(['slug' => $slug])->count();
        $slug = $slug_check > 1 ? $slug.'-3' : $slug;
        if($request->lang === LanguageHelper::default_slug()){
            $category->slug = purify_html($slug);
        }

        $category->image = $request->image;
        $category->status = $request->status;
        $category->save();

        return back()->with(FlashMsg::item_update());
    }

    public function delete_category_all_lang(Request $request,$id){

        if (Product::where('category_id',$id)->first()){
            return redirect()->back()->with([
                'msg' => __('You can not delete this category, It already associated with a product...'),
                'type' => 'danger'
            ]);
        }
        $category =  ProductCategory::where('id',$id)->first();
        $category->delete();

        return back()->with(FlashMsg::item_delete());
    }

    public function bulk_action(Request $request){
        ProductCategory::whereIn('id',$request->ids)->delete();
        return response()->json(['status' => 'ok']);
    }
}
