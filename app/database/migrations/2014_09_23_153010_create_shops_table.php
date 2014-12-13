<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateShopsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shops', function (Blueprint $table)
        {
            $table->increments('id');
            $table->integer('town_id')->unsigned();
            $table->foreign('town_id')->references('id')->on('towns')->onDelete('cascade');
            $table->string('name', 32);
            $table->string('link', 64)->unique();
            $table->smallInteger('balance_deadline');//Días de vigencia del saldo
            $table->decimal('retribution', 5, 4); //Porcentaje de retribución al cliente por compra
            $table->decimal('retribution_per_bill', 5, 4); // Que porcentaje del valor de la compra puede redimir
            $table->string('image_preview', 20);
            $table->string('about', 2048);
            $table->string('lat');
            $table->string('lng');
            $table->string('street_address');
            $table->string('administrator_name');
            $table->string('phone');
            $table->string('cell');
            $table->string('email');
            $table->string('schedule');
            $table->boolean('delivery_service')->default(0);
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
