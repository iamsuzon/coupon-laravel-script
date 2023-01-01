<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->integer('category_id');
            $table->integer('admin_id')->nullable();
            $table->integer('user_id')->nullable();
            $table->integer('brand_id');
            $table->integer('location_id');
            $table->text('title');
            $table->text('slug')->nullable();
            $table->longText('description')->nullable();
            $table->string('author')->nullable();
            $table->text('excerpt')->nullable();
            $table->string('image');
            $table->string('image_gallery')->nullable();
            $table->integer('regular_price')->nullable();
            $table->integer('sale_price')->nullable();
            $table->string('discount')->nullable();
            $table->string('discount_symbol')->nullable();
            $table->string('discount_percentage')->nullable();
            $table->timestamp('expire_date')->nullable();
            $table->integer('views')->nullable();
            $table->text('embed_code')->nullable();
            $table->string('visibility')->nullable();
            $table->string('featured')->nullable();
            $table->string('schedule_date')->nullable();
            $table->enum('status', ['publish', 'draft','archive','schedule']);
            $table->longText('tag_id')->nullable();
            $table->string('created_by')->nullable();
            $table->string('coupon_code');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
