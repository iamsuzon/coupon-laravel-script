<?php

namespace App\Actions\Product;
use App\Blog;
use App\Helpers\LanguageHelper;
use App\MetaData;
use App\Product;
use App\ProductReview;
use App\ProductTag;
use App\ReviewReply;
use App\UserWishlist;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use mysql_xdevapi\Exception;

class ProductUserAction
{

    public function store_execute(Request $request) :void {
        $product = new Product();

        $product
            ->setTranslation('title',$request->lang, purify_html($request->title))
            ->setTranslation('description',$request->lang,$request->description)
            ->setTranslation('excerpt',$request->lang, purify_html($request->excerpt));

        $slug = !empty($request->slug) ? $request->slug : Str::slug($request->title);

        $slug_check = Product::where(['slug' => $slug])->count();
        $slug = $slug_check > 0 ? $slug.'-2' : $slug;

         $product->slug = purify_html($slug);
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        $product->location_id = $request->location_id;

        $tag = $request->tag_id;
        $new_tag_data = explode(',',$tag[0]);

        $product->tag_id = json_encode($new_tag_data) ?? [];

        $product->regular_price = $request->regular_price;
        $product->sale_price = $request->sale_price;
        $discount = preg_replace('/[-+*\/]+/', '', trim($request->discount));
        $product->discount = $discount;
        $product->discount_symbol = $request->discount_symbol;

        $discount_percentage = ($request->sale_price/$request->regular_price)*100;

        $product->discount_percentage = $discount_percentage;
        $product->expire_date = $request->expire_date;
        $product->coupon_code = trim($request->coupon_code);

        $product->featured = $request->featured;
        $product->status = 'publish';
        $product->admin_id = null;
        $product->user_id = Auth::guard('web')->user()->id;
        $product->author = Auth::guard('web')->user()->name;
        $product->image = $request->image;
        $product->image_gallery = $request->image_gallery;
        $product->schedule_date = $request->schedule_date;
        $product->views = 0;
        $product->created_by = 'user';

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


        $product->save();
        $product->meta_data()->create($Metas);
    }


    public function update_execute(Request $request ,$id) : void
    {
        $product_update =  Product::findOrFail($id);

        $product_update
            ->setTranslation('title',$request->lang, purify_html($request->title))
            ->setTranslation('description',$request->lang,$request->description)
            ->setTranslation('excerpt',$request->lang, purify_html($request->excerpt))
            ->save();

        $slug = !empty($request->slug) ? $request->slug : Str::slug($request->title);
        $slug_check = Product::where(['slug' => $slug])->count();
        $slug = $slug_check > 1 ? $slug.'-3' : $slug;
        if($request->lang === LanguageHelper::default_slug()){
            $product_update->slug = purify_html($slug);
        }
        $product_update->category_id = $request->category_id;
        $product_update->brand_id = $request->brand_id;
        $product_update->location_id = $request->location_id;
        $product_update->expire_date = $request->expire_date;

        $product_update->regular_price = $request->regular_price;
        $product_update->sale_price = $request->sale_price;
        $product_update->discount = $request->discount;
        $product_update->discount_symbol = $request->discount_symbol;

        $discount_percentage = ($request->sale_price/$request->regular_price)*100;

        $product_update->discount_percentage = $discount_percentage;
        $product_update->coupon_code = trim($request->coupon_code);

        $tag = $request->tag_id;
        $new_tag_data = explode(',',$tag[0]);

        $product_update->tag_id =  json_encode($new_tag_data) ?? [];
        $product_update->featured = $request->featured;
        $product_update->status = $request->status ?? 'publish';
        $product_update->image = $request->image ?? null;
        $product_update->image_gallery = $request->image_gallery;
        $product_update->schedule_date = $request->schedule_date;

        $Metas = [
            'meta_title'=> purify_html($request->meta_title),
            'meta_tags'=> $request->meta_tags,
            'meta_description'=> purify_html($request->meta_description),

            'facebook_meta_tags'=> purify_html($request->facebook_meta_tags),
            'facebook_meta_description'=> purify_html($request->facebook_meta_description),
            'facebook_meta_image'=> $request->facebook_meta_image,

            'twitter_meta_tags'=> purify_html($request->twitter_meta_tags),
            'twitter_meta_description'=> purify_html($request->twitter_meta_description),
            'twitter_meta_image'=> $request->twitter_meta_image,
        ];

        try {
            $product_update->meta_data()->update($Metas);
            $product_update->save();
        }
        catch (\Exception $exception)
        {

        }
    }

    public function clone_product_execute(Request $request)
    {
        $product_details = Product::findOrFail($request->item_id);

        $discount_percentage = ($product_details->sale_price/$product_details->regular_price)*100;
        $cloned_data = Product::create([
            'category_id' =>  $product_details->category_id,
            'brand_id' =>  $product_details->brand_id,
            'location_id' =>  $product_details->location_id,
            'tag_id' =>  $product_details->tag_id,
            'title' => $product_details->title,
            'slug' => !empty($product_details->slug) ? $product_details->slug : Str::slug($product_details->title),
            'description' => $product_details->description,
            'regular_price' => $product_details->regular_price,
            'sale_price' => $product_details->sale_price,
            'discount' => $product_details->discount,
            'discount_symbol' => $request->discount_symbol,
            'discount_percentage' => $discount_percentage,
            'status' => 'draft',
            'excerpt' => $product_details->excerpt,
            'image' => $product_details->image,
            'image_gallery' => $product_details->image,
            'coupon_code' => trim($product_details->coupon_code),
            'admin_id' => null,
            'user_id' => $product_details->user_id,
            'author' => $product_details->author,
            'schedule_date' => $product_details->schedule_date,
            'featured' => $product_details->featured,
            'created_by' => $product_details->created_by,
            'expire_date' => $product_details->expire_date,
        ]);

        $meta_object = optional($product_details->meta_data);
        $Metas = [
            'meta_title'=> $meta_object->meta_title,
            'meta_tags'=> $meta_object->meta_tags,
            'meta_description'=> $meta_object->meta_description,

            'facebook_meta_tags'=> $meta_object->facebook_meta_tags,
            'facebook_meta_description'=> $meta_object->facebook_meta_description,
            'facebook_meta_image'=> $meta_object->facebook_meta_image,

            'twitter_meta_tags'=> $meta_object->twitter_meta_tags,
            'twitter_meta_description'=> $meta_object->twitter_meta_description,
            'twitter_meta_image'=> $meta_object->twitter_meta_image,
        ];

        $cloned_data->meta_data()->save(MetaData::create($Metas));
    }

    public function delete_execute(Request $request, $id, $type = 'delete')
    {
        switch ($type){
            case ('trashed_delete'):
                $review_ids = [];
                $review = ProductReview::with('replies')->where('product_id', $id)->get();

                if ($review != null)
                {
                    foreach ($review as $r)
                    {
                        $review_ids[] = $r->id;
                    }

                    ReviewReply::whereIn('review_id',$review_ids)->delete();
                    ProductReview::where('product_id', $id)->delete();
                    UserWishlist::where('product_id', $id)->delete();
                }
                Product::withTrashed()->find($id)->forceDelete();

                break;
            default:
                $product = Product::find($id);
                $product->delete();
                break;
        }
    }
}