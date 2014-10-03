<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class ProductsTableSeeder extends Seeder {

    public function run() {
        $faker = Faker::create();



        foreach (range(1, 50) as $index) {
            Product::create([
                'category_id' => $index%3+1,
                'name' => $faker->name,
                'description' => $faker->text,
                'price'=> $faker->randomNumber(5)
            ]);

        }
    }

}
