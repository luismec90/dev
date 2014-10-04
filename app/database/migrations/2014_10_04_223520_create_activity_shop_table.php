<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateActivityShopTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('activity_shop', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('activity_id')->unsigned()->index();
			$table->foreign('activity_id')->references('id')->on('activities')->onDelete('cascade');
			$table->integer('shop_id')->unsigned()->index();
			$table->foreign('shop_id')->references('id')->on('shops')->onDelete('cascade');
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
		Schema::drop('activity_shop');
	}

}
