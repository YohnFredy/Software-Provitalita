<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Business>
 */
class BusinessFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
          return [
            'name' => fake()->unique()->company(), // Genera un nombre de empresa único
            'nit' => fake()->unique()->numerify('#########-#'), // Genera un NIT falso como 987654321-0
        ];
    }
}
