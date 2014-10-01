<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class ProductsTableSeeder extends Seeder {

    public function run() {
        $faker = Faker::create();


        Product::create([
            'category_id' => 1,
            'name' => 'Producto 1'
        ]);
        Product::create([
            'category_id' => 1,
            'name' => 'Producto 2'
        ]);
    }

}
