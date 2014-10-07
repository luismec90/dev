<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class ProductsTableSeeder extends Seeder {

    public function run() {
        $faker = Faker::create();



        
            Product::create([
                'category_id' => 1,
                'name' => "Personal",
                'description' => "350 gr del mejor Angus Argentino. Grado de cocción según preferencia del cliente",
                'price'=> 14900
            ]);
            
            Product::create([
                'category_id' => 1,
                'name' => "Costillas Barbacoa",
                'description' => "Tiernas costillas de cerdo con salsa barbacoa",
                'price'=> 13900
            ]);
            
            Product::create([
                'category_id' => 1,
                'name' => "Choripan",
                'description' => "Hechos al gusto argentino, con adiciones opcionales de anchoas, queso o pimentón.",
                'price'=> 13900
            ]);
            
            
            Product::create([
                'category_id' => 2,
                'name' => "Asado medio",
                'description' => "jasbkjasd",
                'price'=> 5000
            ]);
            
            

       
    }

}
