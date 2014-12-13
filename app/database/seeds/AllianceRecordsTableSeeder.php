<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class AllianceRecordsTableSeeder extends Seeder {

    public function run()
    {

        AllianceRecord::create([
            'id'                                => 1,
            'alliance_id'                       => '1',
            'shop_id'                           => '1',
            'from_retribution_per_user_granted' => '0.1',
            'from_limit_per_user_granted'       => '50000',
            'from_limit_total_granted'          => '500000',
            'to_retribution_per_user_granted'   => '0.05',
            'to_limit_per_user_granted'         => '30000',
            'to_limit_total_granted'            => '400000',
            'note'                              => 'Hola...',
            'status'                            => '1'
        ]);
    }

}