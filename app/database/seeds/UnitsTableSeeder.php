<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class UnitsTableSeeder extends Seeder
{

    public function run()
    {
        $faker = Faker::create();

        Unit::create([
            'id' => '1',
            'name' => 'mililitros',
            'symbol' => 'ml',
        ]);

        Unit::create([
            'id' => '2',
            'name' => 'litros',
            'symbol' => 'l',
        ]);

        Unit::create([
            'id' => '3',
            'name' => 'miligramos',
            'symbol' => 'mg',
        ]);

        Unit::create([
            'id' => '4',
            'name' => 'kilogramos',
            'symbol' => 'kg',
        ]);

        Unit::create([
            'id' => '5',
            'name' => 'unidades',
            'symbol' => 'unidades',
        ]);
    }

}