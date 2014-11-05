<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStockHistoriesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stock_histories', function (Blueprint $table) {

            $table->increments('id');
            $table->integer('stock_id')->unsigned();
            $table->foreign('stock_id')->references('id')->on('stocks')->onDelete('cascade');
            $table->float('amount');
            $table->string('description', 256);
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
        Schema::drop('stock_histories');
    }

}
