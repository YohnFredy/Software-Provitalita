<?php

namespace Database\Seeders;

use App\Models\Commerce;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommerceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Commerce::create(['name' => 'Farmacia Mi Salud', 'nit' => '123456789']);
        Commerce::create(['name' => 'Supermercado El Ahorro', 'nit' => '987654321']);
        Commerce::create(['name' => 'Restaurante Buen Sabor', 'nit' => '1122334455']);
    }
}
