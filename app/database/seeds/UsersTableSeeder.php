<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder {

    public function run()
    {
        $faker = Faker::create();

        User::create([
            'first_name' => 'Luis Fernando',
            'last_name' => 'Montoya Gómez',
            'birth_date'=>'1990-02-22',
            'gender' => 'm',
            'email' => 'luismec90@gmail.com',
            'avatar' => 'default.png',
            'password' => Hash::make("1234"),
            'confirmed' => 1
        ]);

        foreach (range(1, 10) as $index)
        {
            User::create([
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'birth_date'=>$faker->dateTime(),
                'gender' => 'm',
                'email' => $faker->email,
                'avatar' => 'default.png',
                'password' => Hash::make("1234"),
                'confirmed' => 1
            ]);
        }
    }

}