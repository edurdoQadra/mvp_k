<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Asociado>
 */
class ClienteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'codigo_sede' => 'Sede001',
            'dni' => $this->faker->unique()->numerify('########'),
            'fecha_implementacion' => $this->faker->date(),
            'estado' => $this->faker->randomElement(['Activo', 'Inactivo']),
            'instalacion' => $this->faker->randomElement(['Completa', 'Pendiente']),
            'codigo_cliente' => $this->faker->unique()->numerify('CLI-########'),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
