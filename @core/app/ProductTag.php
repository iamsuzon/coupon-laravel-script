<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class ProductTag extends Model
{
    use HasFactory,HasTranslations;

    protected $table = 'product_tags';
    protected $fillable = ['name','status'];
    public $translatable = ['name'];
}
