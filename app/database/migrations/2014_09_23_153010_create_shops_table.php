<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateShopsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shops', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 32)->unique();
            $table->string('link', 64)->unique();
            $table->string('about', 2048);
            $table->string('lat');
            $table->string('lng');
            $table->string('street_address');
            $table->string('phone');
            $table->string('cell');
            $table->string('email');
            $table->string('schedule');
            $table->string('facebook');
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
        Schema::drop('shops');
    }

}
