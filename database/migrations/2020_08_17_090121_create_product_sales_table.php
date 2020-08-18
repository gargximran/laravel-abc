<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_sales', function (Blueprint $table) {
            $table->increments("id");
            $table->integer('product_id')->unsigned();
            $table->integer('per_product_price')->unsigned();
            $table->integer('quantity')->unsigned();
            $table->integer('totalPrice')->unsigned();
            $table->string('product_code');
            $table->integer('invoice_id')->unsigned();
            $table->string('ip');
            $table->integer('status');
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
        Schema::dropIfExists('product_sales');
    }
}
