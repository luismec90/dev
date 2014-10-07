<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class CoversTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

        Cover::create([
            'id'=>1,
            'shop_id' => "1",
            'image' => '1.jpg',
            'caption' => 'jhasgdhjsadg',
            'current'=>1
        ]);

        Cover::create([
            'id'=>2,
            'shop_id' => "1",
            'image' => '2.png',
            'caption' => 'Hola Mundo 2',
        ]);

        Cover::create([
            'id'=>3,
            'shop_id' => "1",
            'image' => '3.jpg',
            'caption' => 'Hola Mundo 3',
        ]);
	}

}