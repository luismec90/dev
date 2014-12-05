<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAlliancesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alliances', function (Blueprint $table)
        {
            $table->increments('id');
            $table->integer('from')->unsigned();
            $table->foreign('from')->references('id')->on('shops')->onDelete('cascade');
            $table->integer('to')->unsigned();
            $table->foreign('to')->references('id')->on('shops')->onDelete('cascade');

            /*
            From=A
            To=B
            */

            /*Porcentaje de las ventas del establecimiento B que el establecimiento que A eta dispuesto a retribuir  por usuario*/
            $table->decimal('from_retribution_per_user_granted', 10, 2);
            /* Limite de dinero que puede acumular un usuario en particular para gastar en el establecimiento A */
            $table->decimal('from_limit_per_user_granted', 10, 2);
            /* Limite de dinero total a entregar a los clientes del establecimiento B */
            $table->decimal('from_limit_total_granted', 10, 2)->nullable();

            /*Porcentaje de las ventas del establecimiento A que el establecimiento que B eta dispuesto a retribuir  */
            $table->decimal('to_retribution_per_user_granted', 10, 2);
            /* Limite de dinero que puede acumular un usuario en particular para gastar en el establecimiento B */
            $table->decimal('to_limit_per_user_granted', 10, 2);
            /* Limite de dinero total a entregar a los clientes del establecimiento B */
            $table->decimal('to_limit_total_granted', 10, 2)->nullable();

            $table->string('status',1)->default(0);// 0=pendiente, 1=activa,2=suspendida
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
        Schema::drop('alliances');
    }

}
