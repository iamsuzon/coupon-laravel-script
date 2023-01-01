<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class Product extends Model
{
    use HasFactory, HasTranslations, SoftDeletes;

    protected $table = 'products';
    protected $fillable = ['category_id',
        'admin_id','brand_id','location_id','title','slug','description',
        'regular_price','sale_price','discount','discount_symbol','discount_percentage','expire_date',
        'image','author','excerpt','status',
        'image_gallery','views',
        'visibility','featured','expire_date'
        ,'created_by','tag_id', 'coupon_code','user_id','title','description','excerpt'
    ];

    public $translatable  = ['title','description','excerpt'];
    protected $dates = ['deleted_at','expire_date'];

    public function admin(){
        return $this->belongsTo(Admin::class,'admin_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function category(){
        return $this->belongsTo(ProductCategory::class,'category_id','id');
    }

    public function author_data(){
        if ($this->attributes['created_by'] === 'user'){
            return User::find($this->attributes['user_id']);
        }
        return Admin::find($this->attributes['admin_id']);
    }

    public function meta_data(){
        return $this->morphOne(MetaData::class,'meta_taggable');
    }

    public function brand()
    {
        return $this->hasOne(ProductBrand::class, 'id', 'brand_id');
    }

    public function location()
    {
        return $this->hasOne(ProductLocation::class, 'id', 'location_id');
    }

    public function reviews()
    {
        return $this->hasMany(ProductReview::class, 'product_id', 'id');
    }

    public function coupon()
    {
        return $this->hasOne(UsedCoupon::class);
    }
}
