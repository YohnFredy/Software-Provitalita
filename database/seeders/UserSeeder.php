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
            'name' => 'alfredo',
            'last_name' => 'correa',
            'dni' => 94154629,
            'username' => 'Lider',
            'email' => 'lider@gmail.com',
            'password' => bcrypt('123'),
        ])->assignRole('Superadmin');
       User::factory(10)->create(); 
    }
}
