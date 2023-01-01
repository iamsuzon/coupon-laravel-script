<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class ProductBrand extends Model
{
    use HasFactory, HasTranslations;

    protected $table = 'product_brands';
    protected $fillable = ['title','status','image'];
    public $translatable = ['title'];

    public function location()
    {
        return $this->hasOne(ProductLocation::class, 'id', 'location_id');
    }
}
