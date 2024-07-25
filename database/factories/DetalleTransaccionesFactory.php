<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DetalleTransacciones>
 */
class DetalleTransaccionesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'porcentaje_c_v' => $this->faker->randomFloat(2, 0, 100),
            'plataforma_id' => $this->faker->randomNumber(),
            'codigo_sede' => 'Sede001',
            'codigo_transaccion' => $this->faker->randomNumber(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
