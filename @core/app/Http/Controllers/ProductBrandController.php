<?php

namespace App\Http\Controllers;

use App\Helpers\FlashMsg;
use App\Helpers\LanguageHelper;
use App\Language;
use App\Product;
use App\ProductBrand;
use App\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductBrandController extends Controller
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
        $this->middleware('permission:product-brand-list|product-brand-create|product-brand-edit|product-brand-delete',['only' => ['index']]);
        $this->middleware('permission:product-brand-create',['only' => ['new_brand']]);
        $this->middleware('permission:product-brand-edit',['only' => ['update_brand']]);
        $this->middleware('permission:product-brand-delete',['only' => ['bulk_action','delete_brand_all_lang']]);
    }

    public function index(Request $request){
        $all_brand = ProductBrand::select(['id','title','slug','status','location_id','image'])->get();
        return view(self::BASE_PATH.'product.brand')->with([
            'all_brand' => $all_brand,
            'default_lang' => $request->lang ?? LanguageHelper::default_slug(),
        ]);
    }

    public function new_brand(Request $request){
        $this->validate($request,[
            'title' => 'required|string|max:191|unique:product_brands',
            'status' => 'required|string|max:191',
            'image' => 'required',
            'location_id' => 'required',
        ]);

        $brand = new ProductBrand();
        $brand
            ->setTranslation('title',$request->lang, purify_html($request->title));

        $slug = !empty($request->slug) ? Str::slug($request->slug) : Str::slug($request->title);
        $slug_check = ProductBrand::where(['slug' => $slug])->count();
        $slug = $slug_check > 0 ? $slug.'-2' : $slug;
        $brand->slug = purify_html($slug);

        $brand->status = $request->status;
        $brand->location_id = $request->location_id;
        $brand->image = $request->image;
        $brand->save();
        return redirect()->back()->with(FlashMsg::item_new('Product Brand Added'));
    }

    public function update_brand(Request $request){
        $this->validate($request,[
            'title' => 'required|string|max:191|unique:product_brands',
            'status' => 'required',
            'image' => 'required',
            'location_id' => 'required',
        ]);

        $brand =  ProductBrand::findOrFail($request->id);
        $brand
            ->setTranslation('title',$request->lang, purify_html($request->title));

        $slug = !empty($request->slug) ? Str::slug($request->slug) : Str::slug($request->title);
        $slug_check = ProductBrand::where(['slug' => $slug])->count();
        $slug = $slug_check > 1 ? $slug.'-3' : $slug;
        if($request->lang === LanguageHelper::default_slug()){
            $brand->slug = purify_html($slug);
        }

        $brand->status = $request->status;
        $brand->location_id = $request->location_id;
        $brand->image = $request->image;
        $brand->save();

        return back()->with(FlashMsg::item_update());
    }

    public function delete_brand_all_lang(Request $request,$id){

        $brand =  ProductBrand::where('id',$id)->first();
        $brand->delete();

        return back()->with(FlashMsg::item_delete());
    }

    public function bulk_action(Request $request){
        ProductBrand::whereIn('id',$request->ids)->delete();
        return response()->json(['status' => 'ok']);
    }
}
