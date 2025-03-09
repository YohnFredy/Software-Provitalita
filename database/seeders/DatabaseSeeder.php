<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Product;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        /* User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]); */

        //Ejecutar el seeder que borra las imágenes
        /*  $this->call(ClearImagesSeeder::class); */

        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
            CountrySeeder::class,
            DepartmentSeeder::class,
            CitySeeder::class,
            RegisterRedSeeder::class,
            CategorySeeder::class,
            ImageSeeder::class, 
        ]);
         Product::factory(10)->create(); 
       
    }
}
