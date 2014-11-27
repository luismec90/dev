<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class ShopsUsersTableSeeder extends Seeder {

    public function run() {
        $faker = Faker::create();


        DB::table('shop_user')->insert(['user_id' => 1, 'shop_id' => 1, 'role' => 1]);
        DB::table('shop_user')->insert(['user_id' => 2, 'shop_id' => 2, 'role' => 1]);
    }

}
