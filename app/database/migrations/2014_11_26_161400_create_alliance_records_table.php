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

            

            /*Porcentaje de las vestas del establecimiento FROM que el establecimiento que TO eta dispuesto a retribuir  por usuario*/
            $table->decimal('from_retribution_per_user_granted', 10, 2);
            /* Limite de dinero que puede acumular un usuario en particular para gastar en el establecimiento TO */
            $table->decimal('from_limit_per_user_granted', 10, 2);
            /* Limite de dinero total a entregar a los clientes del establecimiento FROM */
            $table->decimal('from_limit_total_granted', 10, 2)->nullable();

            /*Porcentaje de las vestas del establecimiento TO que el establecimiento que FROM eta dispuesto a retribuir  */
            $table->decimal('to_retribution_per_user_granted', 10, 2);
            /* Limite de dinero que puede acumular un usuario en particular para gastar en el establecimiento FROM */
            $table->decimal('to_limit_per_user_granted', 10, 2);
            /* Limite de dinero total a entregar a los clientes del establecimiento FROM */
            $table->decimal('to_limit_total_granted', 10, 2)->nullable();
            $table->string('note');

            $table->string('status', 1)->default(0);// 0=pendiente, 1=activa,2=suspendida
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
