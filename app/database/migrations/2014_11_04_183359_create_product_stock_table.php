<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductStockTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('product_stock', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('product_id')->unsigned()->index();
			$table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
			$table->integer('stock_id')->unsigned()->index();
			$table->foreign('stock_id')->references('id')->on('stocks')->onDelete('cascade');
            $table->float('stock_spent');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('product_stock');
	}

}
