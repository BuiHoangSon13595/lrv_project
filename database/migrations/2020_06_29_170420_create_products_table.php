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
            $table->string('name');
            $table->string('slug');
            $table->string('image')->nullable();
            $table->float('price');
            $table->float('sale_price')->nullable();
            $table->string('sumary')->nullable();
            $table->text('content')->nullable();
            $table->string('meta_title')->nullable();
            $table->string('meta_desc')->nullable();
            $table->string('meta_key')->nullable();
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('brand_id');
            $table->foreign('category_id')->on('categories')->references('id');
            $table->foreign('brand_id')->on('brands')->references('id');
            $table->timestamps();
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
