<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductUpdateRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'category_id' => 'required',
            'location_id' => 'required',
            'brand_id' => 'required',
            'tag_id' => 'nullable',
            'description' => 'required',
            'regular_price' => 'required',
            'sale_price' => 'required',
            'coupon_code' => 'required',
            'expire_date' => 'required',
            'tags' => 'nullable',
            'excerpt' => 'nullable',
            'title' => 'required|string|max:191',
            'status' => 'nullable',
            'author' => 'nullable',
            'slug' => 'nullable',
            'meta_tags' => 'nullable|string',
            'meta_description' => 'nullable|string',
            'image' => 'required|string|max:191',
        ];
    }
}
