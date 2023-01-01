<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class ProductCategory extends Model
{
    use HasFactory, HasTranslations;

    protected $table = 'product_categories';
    protected $fillable = ['title','status','image'];
    public $translatable = ['title'];

    public function products()
    {
        return $this->hasMany(Product::class, 'category_id', 'id');
    }
}
