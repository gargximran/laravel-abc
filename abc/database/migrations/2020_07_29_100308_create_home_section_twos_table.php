<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHomeSectionTwosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('home_section_twos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_card_title');
            $table->string('first_card_subtitle');
            $table->string('first_card_image');

            $table->string('second_card_title');
            $table->string('second_card_subtitle');
            $table->string('second_card_image');

            $table->string('third_card_title');
            $table->string('third_card_subtitle');
            $table->string('third_card_image');


            $table->string('forth_card_title');
            $table->text('forth_card_subtitle');
            
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
        Schema::dropIfExists('home_section_twos');
    }
}
