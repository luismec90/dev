<?php

class DatabaseSeeder extends Seeder {

    public function run() {
        Eloquent::unguard();
        $this->call('TownsTableSeeder');
        $this->call('ActivitiesTableSeeder');
        $this->call('RolesTableSeeder');
        $this->call('UsersTableSeeder');
        $this->call('ShopsTableSeeder');
        $this->call('ShopsUsersTableSeeder');
        $this->call('CategoriesTableSeeder');
        $this->call('ProductsTableSeeder');
        $this->call('ReviewsTableSeeder');
        $this->call('CoversTableSeeder');
        $this->call('ActivitiesShopsTableSeeder');
        $this->call('UnitsTableSeeder');
        $this->call('AlliancesTableSeeder');
        $this->call('AllianceRecordsTableSeeder');
    }

}
