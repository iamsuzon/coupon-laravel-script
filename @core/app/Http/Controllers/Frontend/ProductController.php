<?php

namespace App\Http\Controllers\Frontend;

use App\Advertisement;
use App\Http\Controllers\Controller;
use App\Product;
use App\ProductBrand;
use App\ProductCategory;
use App\ProductLocation;
use App\ProductTag;
use App\UsedCoupon;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function product_single($slug)
    {
        $single_product = Product::where(['slug'=> $slug, 'status'=> 'publish'])->firstOrFail();

        if (is_null($single_product->views)) {
            Product::with('brand','category', 'location', 'wishlist')->where('id', $single_product->id)->update(['views' => 0]);
        } else {
            Product::where('id', $single_product->id)->increment('views');
        }

        $related_products = Product::where('status', 'publish')
                                    ->where('category_id','!=',$single_product->id)
                                    ->inRandomOrder()
                                    ->take(2)
                                    ->get();

        return view('frontend.pages.product-single.details', compact('single_product','related_products'));
    }

    public function category_single($slug)
    {
        $category = ProductCategory::where('slug',$slug)->firstOrFail();
        $products = Product::with('brand','location','category')
                            ->where('category_id',$category->id)
                            ->where('status' ,'publish')
                            ->paginate(9);

        return view('frontend.category', compact('category','products'));
    }

    public function brand_single($slug)
    {
        $brand = ProductBrand::where('slug',$slug)->firstOrFail();
        $products = Product::with('brand','location','category')->where('brand_id',$brand->id)
            ->where('status' ,'publish')
            ->select('id','title','category_id','admin_id','brand_id','location_id','slug','description','regular_price','sale_price','expire_date','image')
            ->paginate(9);

        return view('frontend.brand', compact('brand','products'));
    }

    public function location_single($slug)
    {
        $location = ProductLocation::where('slug',$slug)->firstOrFail();
        $products = Product::with('brand','location','category','reviews')
            ->where('location_id',$location->id)
            ->where('status' ,'publish')
            ->paginate(9);

        return view('frontend.location', compact('location','products'));
    }

    public function tag_single($tag)
    {
        $products = Product::whereJsonContains('tag_id', $tag)->paginate(get_static_option('blog_tags_item_show'));

        return view('frontend.tag', compact('tag','products'));
    }

    public function product_coupon_used_by_ajax(Request $request)
    {
        $request->validate([
            'product_id' => 'required|numeric'
        ]);

        $check = UsedCoupon::where('product_id', $request->product_id)->first();

        UsedCoupon::updateOrCreate(
            [
                'product_id' => $request->product_id
            ],
            [
                'product_id' => $request->product_id,
                'coupon_used' => $check != null  ? 1+$check->coupon_used : 1
            ]
        );

        return true;
    }
}
