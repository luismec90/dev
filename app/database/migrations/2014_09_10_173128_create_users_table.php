<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table)
        {
            $table->increments('id');
            $table->string('first_name', 45);
            $table->string('last_name', 45);
            $table->date('birth_date');
            $table->string('gender', '1');
            $table->string('email')->unique();
            $table->string('avatar', 15);
            $table->string('password', 60);
            $table->string('code',10)->default("1234");
            $table->boolean('confirmed')->default(0);
            $table->string('confirmation_code')->nullable();
            $table->rememberToken();
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
        Schema::drop('users');
    }

}
