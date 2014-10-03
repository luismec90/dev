<?php

class DatabaseSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        Eloquent::unguard();
        $this->call('RolesTableSeeder');
        $this->call('UsersTableSeeder');
        $this->call('ShopsTableSeeder');
        $this->call('ShopsUsersTableSeeder');
        $this->call('CategoriesTableSeeder');
        $this->call('ProductsTableSeeder');
        $this->call('ReviewsTableSeeder');
    }

}
