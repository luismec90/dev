<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class ShopsTableSeeder extends Seeder
{

    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 1) as $index) {

        }
        Shop::create([
            'id' => 1,
            'name' => 'Restaurante Noma',
            'link' => 'restaurantenoma'
        ]);
        Shop::create([
            'id' => 2,
            'name' => "Pacho's Pizaa",
            'link' => 'pachospizza'
        ]);
    }

}
