<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BusinessData>
 */
class BusinessDataFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
       
        return [
            'phone' => fake()->phoneNumber(),
            'email' => fake()->safeEmail(),
            'country' => 'Colombia',
            'department' => fake()->state(), // 'state' es el equivalente más cercano en Faker
            'city' => fake()->city(),
            'address' => fake()->streetAddress(),
        ];
    }
}
