<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class ActivitiesTableSeeder extends Seeder
{

    public function run()
    {
        $faker = Faker::create();


        Activity::create([
            'id' => 1,
            'name' => 'Comer',
        ]);

        Activity::create([
            'id' => 2,
            'name' => 'Comprar ropa',
        ]);

        Activity::create([
            'id' => 3,
            'name' => 'Ocio',
        ]);

    }

}