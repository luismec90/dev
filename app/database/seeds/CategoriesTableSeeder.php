<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class CategoriesTableSeeder extends Seeder {

    public function run() {
        $faker = Faker::create();

        foreach (range(1, 1) as $index) {
            
        }
        Category::create([
            'shop_id' => 1,
            'name' => 'Categoría 1'
        ]);
        Category::create([
            'shop_id' => 1,
            'name' => 'Categoría 2'
        ]);
        Category::create([
            'shop_id' =>1,
            'name' => 'Categoría 3'
        ]);
    }

}
