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
        Schema::create('alliance_records', function (Blueprint $table)
        {
            $table->increments('id');
            $table->integer('alliance_id')->unsigned();
            $table->foreign('alliance_id')->references('id')->on('alliances')->onDelete('cascade');
            $table->integer('shop_id')->unsigned();
            $table->foreign('shop_id')->references('id')->on('shops')->onDelete('cascade');

            /*
            From=A
            To=B
            */

            /*Porcentaje de las vestas del establecimiento B que el establecimiento que A eta dispuesto a retribuir  por usuario*/
            $table->decimal('from_retribution_per_user_granted', 5, 4);
            /* Limite de dinero que puede acumular un usuario en particular para gastar en el establecimiento A */
            $table->decimal('from_limit_per_user_granted', 5, 4);
            /* Limite de dinero total a entregar a los clientes del establecimiento B */
            $table->decimal('from_limit_total_granted', 5, 4)->nullable();

            /*Porcentaje de las vestas del establecimiento A que el establecimiento que B eta dispuesto a retribuir  */
            $table->decimal('to_retribution_per_user_granted', 5, 4);
            /* Limite de dinero que puede acumular un usuario en particular para gastar en el establecimiento B */
            $table->decimal('to_limit_per_user_granted', 5, 4);
            /* Limite de dinero total a entregar a los clientes del establecimiento B */
            $table->decimal('to_limit_total_granted', 5, 4)->nullable();
            $table->string('note');
            $table->boolean('active')->default(0);
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
