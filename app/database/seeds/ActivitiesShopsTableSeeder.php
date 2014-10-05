<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class ActivitiesShopsTableSeeder extends Seeder {

    public function run() {
        $faker = Faker::create();

        DB::table('activity_shop')->insert(['activity_id' => 1, 'shop_id' => 1]);
        DB::table('activity_shop')->insert(['activity_id' => 1, 'shop_id' => 2]);
    }

}
