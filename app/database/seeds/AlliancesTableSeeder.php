<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class AlliancesTableSeeder extends Seeder {

    public function run()
    {

        Alliance::create([
            'id'                                => 1,
            'from'                              => '1',
            'to'                                => '2',
            'from_retribution_per_user_granted' => '0.1',
            'from_limit_per_user_granted'       => '50000',
            'from_limit_total_granted'          => '500000',
            'to_retribution_per_user_granted'   => '0.05',
            'to_limit_per_user_granted'         => '30000',
            'to_limit_total_granted'            => '400000',
            'status'                            => '1'
        ]);
    }

}