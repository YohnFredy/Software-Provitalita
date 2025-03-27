<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Yohn Fredy',
            'last_name' => 'Guapacha',
            'dni' => 94154629,
            'username' => 'master',
            'email' => 'fredy.guapacha@gmail.com',
            'password' => bcrypt('123'),
        ])->assignRole('Superadmin');
       /*  User::factory(9)->create(); */

       
    }
}
