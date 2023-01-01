<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Product;
use App\ProductBrand;
use App\ProductCategory;
use App\ProductLocation;
use App\ProductReview;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AllProductController extends Controller
{
    public function index(Request $request)
    {
        $HAS_FILTER = 0;
        $filter = [];
        $data['products'] = Product::where('status', 'publish')->orderBy('id','DESC')->paginate(10);
        $data['categories'] = ProductCategory::where('status', 'publish')->whereHas('products')->select('id', 'title')->get();
        $data['brands'] = ProductBrand::select('id', 'title', 'image')->get();
        $data['locations'] = ProductLocation::select('id', 'city_name', 'state_name')->get();

        $products = Product::where('status','publish');
        if(isset($request->category)){
            $data['products'] = $products->where('category_id', $request->category);
            $filter['category'] = ProductCategory::find($request->category);
            $HAS_FILTER++;
        }
        if(isset($request->location)){
            $data['products'] = $products->where("location_id",$request->location);
            $filter['location'] = ProductLocation::find($request->location);

            $HAS_FILTER++;
        }
        if (isset($request->min_price) AND isset($request->max_price))
        {
            $data['products'] =  $products->whereBetween('sale_price', [$request->min_price, $request->max_price]);
            $HAS_FILTER++;
        }
        if(isset($request->brand)){
            $data['products'] = $products->where('brand_id',$request->brand);
            $filter['brand'] = ProductBrand::find($request->brand);
            $HAS_FILTER++;
        }
        if (isset($request->rating))
        {
            $data['products'] = $products
                ->select('products.*','product_reviews.rating')
                ->where('rating', $request->rating)
                                        ->join('product_reviews', 'product_reviews.product_id', '=', 'products.id');
            $filter['rating'] = $request->rating;
            $HAS_FILTER++;
        }
        if (isset($request->sort))
        {
            switch ($request->sort)
            {
                case 'popularity':
                    $data['products'] = $products->orderBy("views", 'DESC');
                    break;

                case 'latest':
                    $data['products'] = $products->orderBy("created_at", 'DESC');
                    break;

                case 'price-low':
                    $data['products'] = $products->orderBy("sale_price", 'ASC');
                    break;

                case 'price-high':
                    $data['products'] = $products->orderBy("sale_price", 'DESC');
                    break;
            }

            $HAS_FILTER++;
        }


        if ($HAS_FILTER>0)
        {
            $data['products'] = $data['products']->paginate(10);
        }

        return view('frontend.pages.all_product.products', compact('data','filter'));
    }

    public function search(Request $request)
    {
        $default_lang = $request->default_lang;
        $data = Product::usingLocale($default_lang)->where('status', 'publish')
            ->where('title', 'like', '%' . $request->search_query . '%')
            ->orWhere('sale_price', 'like', '%' . $request->search_query . '%')
            ->with('category', 'brand', 'location')
            ->get();

        $markup = '';

        foreach ($data as $key => $item) {

            $product_name = \Str::words($item->title, 10);
            $product_regular_price = $item->regular_price;
            $product_sale_price = $item->sale_price;
            $product_image_markup = render_image_markup_by_attachment_id($item->image, 'border-radius-10', 'grid', false);
            $product_route = route_single_product($item->slug);
            $product_rating = get_product_rating_average($item->id);
            $product_expire = render_deal_expire_date_markup($item->expire_date);

            $product_rating_markup = '';
            if ($product_rating>0) {
                $product_rating_markup = <<<MARKUP
<div class="star">
                                                    <i class="las la-star icon"></i>
                                                </div>
                                                <div class="rating-count">($product_rating)</div>
MARKUP;
            }


            $category_name = optional($item->category)->title;
            $category_route = route_single_category(optional($item->category)->slug);

            $brand_name = optional($item->brand)->title;
            $brand_route = route_single_brand(optional($item->brand)->slug);
            $brand_image_markup = render_image_markup_by_attachment_id(optional($item->brand)->image, '', 'grid', false);

            $location_name = optional($item->location)->city_name.', '.optional($item->location)->state_name;

            $currency = site_currency_symbol();

            $markup .= <<<MARKUP
<div class="col-sm-12 col-md-6 col-lg-6">
                                <div class="single-featured-item style-01">
                                    <div class="img-box">
                                        <a href="{$category_route}" class="catg-tag top-left border-radius-15"
                                           tabindex="0">{$category_name}</a>
                                        <a href="{$product_route}" tabindex="0">
                                            {$product_image_markup}
                                        </a>
                                    </div>
                                    <div class="content">
                                        <div class="top-content">
                                            <div class="left-content">
                                                <div class="logo-box">
                                                    <a href="{$brand_route}" tabindex="0">
                                                        {$brand_image_markup}
                                                    </a>
                                                </div>
                                                <div class="details">
                                                    <a href="{$brand_route}" class="title" tabindex="0">{$brand_name}</a>
                                                    <p class="location">{$location_name}</p>
                                                </div>
                                            </div>
                                            <div class="right-content">
                                                {$product_rating_markup}
                                            </div>
                                        </div>
                                        <div class="middle-content">
                                            <a href="{$product_route}" class="offer">{$product_name}</a>
                                        </div>
                                        <div class="bottom-content">
                                            <div class="left-content">
                                                <div class="pricing">
                                                    <span class="price">{$currency}{$product_sale_price}</span>
                                                    <del>{$currency}{$product_regular_price}</del>
                                                </div>
                                            </div>
                                            <div class="right-content">
                                                <span class="offer-duration">
                                                    {$product_expire}
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
MARKUP;
        }

        return response()->json(['markup'=>$markup]);
    }


    //search by category
    public function searchByCategory(Request $request)
    {
        $products = Product::query();
        if(isset($request->category)){
            $data['products'] = $products->where('category_id', $request->category);
        }
        if(isset($request->location)){
            $data['products'] = $products->where("location_id",$request->location);
        }

        $data['products'] = $data['products']->paginate(10);

        $data['categories'] = ProductCategory::where('status', 'publish')->select('id', 'title')->get();
        $data['brands'] = ProductBrand::select('id', 'title', 'image')->get();
        $data['locations'] = ProductLocation::select('id', 'city_name', 'state_name')->get();

        return view('frontend.pages.all_product.search_result', compact('data'));
    }

    //search by sub location
    public function searchByLocation(Request $request)
    {
        $products = Product::where('location_id', $request->location_id)
            ->where('status', 'publish')
            ->get();

        return response()->json([
            'status' => 'success',
            'products' => $products,
            'location_id' => $request->location_id,
            'result' => view('frontend.pages.all_product.search_result', compact('products'))->render(),
        ]);
    }

    public function product_popup_by_ajax(Request $request)
    {
        $deal = Product::with(['category','brand'])->findOrFail($request->id);

        $markup = '';
        $deal_image = render_image_markup_by_attachment_id(optional($deal->brand)->image, 'modal-img','grid',false);
        $deal_id = $deal->id;
        $deal_title = $deal->title;
        $deal_description = Str::limit(strip_tags($deal->description, 200), 500);
        $deal_coupon_code = $deal->coupon_code;
        $deal_expire_date = $deal->expire_date->format('d M Y - H:m A');

        $rating_count = ProductReview::where('product_id', $deal->id)->select('rating')->count('rating');
        $deal_rating = $rating_count ? '('.$rating_count.')' : '';

        $deal_star_rating = render_ratings(get_product_rating_average($deal->id));

        $social_share_markup = single_post_share(route_single_product($deal->slug), $deal->title, get_attachment_image_by_id($deal->image)['img_url']);
        $deal_route = route_single_product($deal->slug);

        $used_coupon = $deal->coupon != null ? optional($deal->coupon)->coupon_used : 0;

        $copied_text = __('Copied');
        $show_coupon_text = __('Show Coupon');
        $used_today_text = __('Used Total');
        $share_text = __('Share');
        $expire_text = __('Expire on:');

        $go_to_single_product_page = get_static_option('popup_button_text') ?? __('Get this offer');
        $popup_footer_text = get_static_option('popup_footer_text') ?? __('Need Help? View FAQ');
        $popup_footer_link = get_static_option('popup_footer_link') ?? '#';

        $markup = <<<HTML
    <div class="product-modal">
        <div class="product-img">
            {$deal_image}
        </div>
        <div class="content">
            <h4 class="title modal-title">{$deal_title}</h4>

            <p class="info">{$deal_description}</p>

            <div class="coupon-info">
                <div class="btn-wrapper">
                    <div class="overflow-hidden">
                        <button class="coupon-01">
                            <span class="code modal-code" data-code="{$deal_coupon_code}" data-product_id="{$deal_id}">{$deal_coupon_code}</span>
                            <span class="overlay"> {$show_coupon_text} </span>
                        </button>
                    </div>
                </div>
                <div class="copy-box">
                    <a href="javascript:void(0)" data-code="{$deal_coupon_code}" data-product_id="{$deal_id}">
                        <i class="lar la-copy icon"></i>
                    </a>
                    <p class="copy-text"> {$copied_text} </p>
                </div>
                <div class="link-box">
                    <a href="{$deal_route}">{$go_to_single_product_page} <i class="las la-arrow-right icon"></i></a>
                </div>
            </div>
            <div class="expire-date">
                <p class="info">
                    <span class="color-text-02">{$expire_text}</span>
                    <span class="date">{$deal_expire_date}</span>
                </p>
            </div>
            <div class="pop-footer">
                <div class="left-content">
                    <span class="today-user"><span class="used numb">{$used_coupon}</span> {$used_today_text}</span>
                    <div class="star-feedback">
                        <div class="star">
                            {$deal_star_rating}
                        </div>
                        <div class="rating-count">{$deal_rating}</div>
                    </div>
                </div>
                <div class="right-content">
                    <div class="social-icon">
                        <ul class="social-link-list">
                            <li class="link-item text">{$share_text}</li>
                            {$social_share_markup}
                        </ul>
                    </div>
                </div>
            </div>
            <div class="bottom-footer">
                <p class="info"><a href="{$popup_footer_link}">{$popup_footer_text}</a></p>
            </div>
        </div>
        <div class="close-btn" id="close">
            <span class="btn-x">×</span>
        </div>
    </div>
HTML;

        return response([
            'markup' => $markup
        ]);
    }
}
