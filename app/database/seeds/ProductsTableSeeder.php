<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class ProductsTableSeeder extends Seeder {

    public function run() {
        $faker = Faker::create();



        
            Product::create([
                'category_id' => 1,
                'name' => "Asado Personal",
                'description' => "350 gr del mejor Angus Argentino. Grado de cocción según preferencia del cliente.",
                'delivery_service'=>1,
                'price'=> 14900
            ]);
            
            Product::create([
                'category_id' => 1,
                'name' => "Costillas Barbacoa",
                'description' => "Tiernas costillas de cerdo con salsa barbacoa.",
                'delivery_service'=>1,
                'price'=> 13900
            ]);
            
            Product::create([
                'category_id' => 1,
                'name' => "Choripan",
                'description' => "Hechos al gusto argentino, con adiciones opcionales de anchoas, queso o pimentón.",
                'price'=> 9900
            ]);
            
            Product::create([
                'category_id' => 1,
                'name' => "Asado Familiar",
                'description' => "Asado tamaño familiar, variado con múltiples tipos de carne. Incluye chorizo, morcilla y adiciones según preferencia del comprador ",
                'price'=> 19900
            ]);          
            
            Product::create([
                'category_id' => 1,
                'name' => "Asado Grupal",
                'description' => "Asado tamaño grupal, variado, con múltiples tipos de carne. Incluye chorizo, morcilla y adiciones según preferencia del comprador ",
                'delivery_service'=>1,
                'price'=> 49900
            ]);
            
            Product::create([
                'category_id' => 1,
                'name' => "Provoleta",
                'description' => "Queso mozarella a la parrilla con orégano.",
                'price'=> 11900
            ]);          
            
            Product::create([
                'category_id' => 2,
                'name' => "Picada Tradicional",
                'description' => "La típica picada argentina con adiciones al gusto.",
                'price'=> 18900
            ]);
            
            Product::create([
                'category_id' => 2,
                'name' => "Picada Familiar",
                'description' => "La mejor picada argentina para disfrtitar con tu familia. Incluye anchoas y adiciones al gusto.",
                'price'=> 34900
            ]);
            
            
            Product::create([
                'category_id' => 2,
                'name' => "Picada Salami",
                'description' => "Picada elaborada exclusivamente con el mejor salami argentino.",
                'delivery_service'=>1,
                'price'=> 7900
            ]);
            
            Product::create([
                'category_id' => 3,
                'name' => "Ensalada Tres Hojas",
                'description' => "Incluye escarola rizada, achicoria roja, canónigos, maíz, aceitunas, tomate, atún.",
                'price'=> 7900
            ]);
            
            Product::create([
                'category_id' => 3,
                'name' => "Ensalada Templada",
                'description' => "Incluye lechuga, picatostes, tomates cherry, bacon y salsa.",
                'delivery_service'=>1,
                'price'=> 9900
            ]);
            
            Product::create([
                'category_id' => 3,
                'name' => "Ensalada César",
                'description' => "Incluye pollo a la parrilla, tomate, lechuga, maíz, picatostes, queso parmesano y salsa césar.",
                'delivery_service'=>1,
                'price'=> 7900
            ]);
            

       
    }

}
