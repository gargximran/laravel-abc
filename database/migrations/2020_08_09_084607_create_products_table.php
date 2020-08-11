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
            $table->increments("id");
            $table->string('name')->unique();
            $table->string('slug')->unique();
            $table->integer('category_id')->unsigned();
            $table->string('brand')->default('ABC');
            $table->integer('regular_price')->unsigned();
            $table->integer('offer_price')->default(0)->unsigned();
            $table->string('model')->nullable();
            $table->string('size');
            $table->string('code')->unique();
            $table->boolean('status')->default(true);
            $table->text('specification')->nullable();
            $table->text('description')->nullable();
            $table->integer('quantity')->default(0)->unsigned();
            $table->boolean('exclusive')->default(false);
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
