<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRetributionBetweenShopsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('retribution_between_shops', function (Blueprint $table)
        {
            $table->increments('id');
            $table->integer('shop_who_distributes')->unsigned();
            $table->foreign('shop_who_distributes')->references('id')->on('shops')->onDelete('cascade');
            $table->integer('shop_who_gives')->unsigned();
            $table->foreign('shop_who_gives')->references('id')->on('shops')->onDelete('cascade');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('bill_id')->unsigned();
            $table->foreign('bill_id')->references('id')->on('bills')->onDelete('cascade');
            $table->decimal('retribution', 10, 2);
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
        Schema::drop('retribution_between_shops');
    }

}
