<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class ProductLocation extends Model
{
    use HasFactory, HasTranslations;

    protected $table = 'product_locations';
    protected $fillable = ['city_name','state_name','status'];
    public $translatable = ['city_name','state_name'];

    public function products()
    {
        return $this->hasMany(Product::class, 'location_id', 'id');
    }
}
