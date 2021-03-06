<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class ShopsTableSeeder extends Seeder {

    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 1) as $index)
        {

        }
        Shop::create([
            'id'                   => 1,
            'town_id'              => 491,
            'name'                 => 'Restaurante Noma',
            'link'                 => 'restaurantenoma',
            'balance_deadline'     => 30,
            'retribution'          => '0.1',
            'retribution_per_bill' => '0.40',
            'image_preview'        => 'preview.jpg',
            'about'                => $faker->paragraph($nb = 10),
            'lat'                  => '6.172831',
            'lng'                  => '-75.333458',
            'street_address'       => $faker->address,
            'phone'                => $faker->phoneNumber,
            'cell'                 => $faker->phoneNumber,
            'email'                => 'luismec90@gmail.com',
            'schedule'             => ' Lu - Ju: 11:00 AM to 7:00 PM, Vi - Do: 11:00 AM to 10:00 PM ',
            'delivery_service'     => '1',
            'facebook'             => 'https://www.facebook.com/Noma.restaurant'
        ]);

        Shop::create([
            'id'               => 2,
            'town_id'          => 491,
            'name'             => "Pacho's Pizaa",
            'link'             => 'pachospizza',
            'balance_deadline' => 30,
            'retribution'      => '0.05',
            'retribution_per_bill' => '0.35',
            'image_preview'    => 'preview.jpg',
            'about'            => $faker->paragraph($nb = 10),
            'lat'              => '6.172831',
            'lng'              => '-75.333458',
            'street_address'   => $faker->address,
            'phone'            => $faker->phoneNumber,
            'cell'             => $faker->phoneNumber,
            'email'            => 'luismec90@gmail.com',
            'schedule'         => 'https://www.facebook.com/Noma.restaurant'
        ]);
    }

}
