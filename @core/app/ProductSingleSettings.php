<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSingleSettings extends Model
{
    use HasFactory;

    protected $table = 'single_product_settings';

    protected $fillable = [
      'ad_type', 'ad_order'
    ];
}
