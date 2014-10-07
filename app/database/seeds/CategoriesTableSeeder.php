<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class CategoriesTableSeeder extends Seeder {

    public function run() {
        $faker = Faker::create();

        foreach (range(1, 1) as $index) {
            
        }
        Category::create([
            'id'=>1,
            'shop_id' => 1,
            'name' => 'Asados'
        ]);
        Category::create([
            'id'=>2,
            'shop_id' => 1,
            'name' => 'Tradicional'
        ]);
        Category::create([
            'id'=>3,
            'shop_id' =>1,
            'name' => 'Típica'
        ]);
    }

}
