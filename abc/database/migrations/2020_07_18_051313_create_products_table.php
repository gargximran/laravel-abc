<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('slug');
            $table->string('cat_slug');
            $table->string('sub_cat_slug')->nullable();
            $table->integer('price')->nullable();
            $table->integer('sell_Price');
            $table->string('sku')->nullable();
            $table->float('discount')->nullable();
            $table->text('short_description');
            $table->text('long_description');
            $table->integer('qty');
            $table->string('status');
            $table->text('images');
            $table->text('images_one');
            $table->text('images_two');
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
