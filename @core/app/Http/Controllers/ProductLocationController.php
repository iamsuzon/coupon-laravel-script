<?php

namespace App\Http\Controllers;

use App\Helpers\FlashMsg;
use App\Helpers\LanguageHelper;
use App\Language;
use App\Product;
use App\ProductBrand;
use App\ProductLocation;
use App\ProductTag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductLocationController extends Controller
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
        $this->middleware('permission:product-location-list|product-location-create|product-location-edit|product-location-delete',['only' => ['index']]);
        $this->middleware('permission:product-location-create',['only' => ['new_location']]);
        $this->middleware('permission:product-location-edit',['only' => ['update_location']]);
        $this->middleware('permission:product-location-delete',['only' => ['bulk_action','delete_location_all_lang']]);
    }

    public function index(Request $request){
        $all_location = ProductLocation::select(['id','city_name','state_name','slug','status','image'])->get();
        return view(self::BASE_PATH.'product.location')->with([
            'all_location' => $all_location,
            'default_lang' => $request->lang ?? LanguageHelper::default_slug(),
        ]);
    }

    public function new_location(Request $request)
    {
        $this->validate($request,[
            'city_name' => 'required|string|max:191|unique:product_locations',
            'state_name' => 'required|string|max:191|unique:product_locations',
            'status' => 'required|string|max:191',
            'image' => 'required|numeric'
        ]);

        $location = new ProductLocation();
        $location
            ->setTranslation('city_name',$request->lang, purify_html($request->city_name));
        $location
            ->setTranslation('state_name',$request->lang, purify_html($request->state_name));

        $slug = !empty($request->slug) ? Str::slug($request->slug) : Str::slug($request->city_name.'-'.$request->state_name);
        $slug_check = ProductLocation::where(['slug' => $slug])->count();
        $slug = $slug_check > 0 ? $slug.'-2' : $slug;
        $location->slug = purify_html($slug);

        $location->status = $request->status;
        $location->image = $request->image;
        $location->save();
        return redirect()->back()->with(FlashMsg::item_new('Product Location Added'));
    }

    public function update_location(Request $request){
        $this->validate($request,[
            'city_name' => 'required|string|max:191|unique:product_locations',
            'state_name' => 'required|string|max:191|unique:product_locations',
            'status' => 'required|string|max:191',
        ]);

        $location =  ProductLocation::findOrFail($request->id);
        $location
            ->setTranslation('city_name',$request->lang, purify_html($request->city_name));
        $location
            ->setTranslation('state_name',$request->lang, purify_html($request->state_name));

        $slug = !empty($request->slug) ? Str::slug($request->slug) : Str::slug($request->city_name.'-'.$request->state_name);
        $slug_check = ProductLocation::where(['slug' => $slug])->count();
        $slug = $slug_check > 1 ? $slug.'-3' : $slug;
        if($request->lang === LanguageHelper::default_slug()){
            $location->slug = purify_html($slug);
        }

        $location->status = $request->status;
        $location->image = $request->image;
        $location->save();

        return back()->with(FlashMsg::item_update());
    }

    public function delete_location_all_lang(Request $request,$id){

        if (Product::where('location_id',$id)->first()){
            return redirect()->back()->with([
                'msg' => __('You can not delete this location, It already associated with a product...'),
                'type' => 'danger'
            ]);
        }
        $location =  ProductLocation::where('id',$id)->first();
        $location->delete();

        return back()->with(FlashMsg::item_delete());
    }

    public function bulk_action(Request $request){
        ProductLocation::whereIn('id',$request->ids)->delete();
        return response()->json(['status' => 'ok']);
    }
}
