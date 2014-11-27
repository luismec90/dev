<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAllianceRecordsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('alliance_records', function(Blueprint $table)
		{
			$table->increments('id');
            $table->integer('alliance_id')->unsigned();
            $table->foreign('alliance_id')->references('id')->on('alliances')->onDelete('cascade');
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
		Schema::drop('alliance_records');
	}

}
