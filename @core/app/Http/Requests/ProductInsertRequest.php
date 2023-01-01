<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductInsertRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'category_id' => 'required',
            'tag_id' => 'nullable',
            'description' => 'required',
            'title' => 'required|string|max:191',
            'status' => 'nullable',
            'slug' => 'nullable',
            'regular_price' => 'required',
            'sale_price' => 'required',
            'coupon_code' => 'required',
            'image' => 'nullable|string|max:191',
            'expire_date' => 'required'
        ];
    }
}
