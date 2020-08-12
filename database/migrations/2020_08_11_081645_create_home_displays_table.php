<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomeDisplaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('home_displays', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titleOne');
            $table->string('descriptionOne');
            $table->text('imageOne');

            $table->string('titleTwo');
            $table->string('descriptionTwo');
            $table->text('imageTwo');

            $table->string('titleThree');
            $table->string('descriptionThree');
            $table->text('imageThree');

            $table->string('title');
            $table->string('slug');
            $table->text('description');
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
        Schema::dropIfExists('home_displays');
    }
}