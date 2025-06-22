<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BusinessCategory>
 */
class BusinessCategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // Genera un nombre de categoría único y realista
            'name' => fake()->unique()->randomElement([
                'Tecnología', 'Restaurantes', 'Consultoría', 'Salud y Bienestar',
                'Educación', 'Tiendas Minoristas', 'Servicios Financieros', 'Entretenimiento',
                'Construcción', 'Bienes Raíces', 'Marketing Digital', 'Logística'
            ]),
        ];
    }
}
