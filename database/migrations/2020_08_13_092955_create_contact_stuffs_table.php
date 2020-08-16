<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactStuffsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact_stuffs', function (Blueprint $table) {
            $table->increments('id');

            $table->string('nameOne')->nullable();
            $table->string('designationOne')->nullable();
            $table->text('phoneOne')->nullable();
            $table->text('emailOne')->nullable();
            $table->text('imageOne')->nullable();

            $table->string('nameTwo');
            $table->string('designationTwo')->nullable();
            $table->text('phoneTwo')->nullable();
            $table->text('emailTwo')->nullable();
            $table->text('imageTwo')->nullable();

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
        Schema::dropIfExists('contact_stuffs');
    }
}
