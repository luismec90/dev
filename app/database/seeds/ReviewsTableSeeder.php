<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class ReviewsTableSeeder extends Seeder {

    public function run()
    {
        $faker = Faker::create();



        foreach (range(1, 10) as $index)
        {
            Review::create([
                'product_id' =>1,
                'user_id' => 1,
                'rating'=>$faker->randomDigit(),
                'comment' =>$faker->text(),
            ]);
        }
    }

}