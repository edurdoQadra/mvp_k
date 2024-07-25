<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transacciones>
 */
class TransaccionesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'fecha' => $this->faker->date(),
            'codigo_sede' => 'Sede001',
            'codigo_transaccion' => $this->faker->unique()->numerify('TRANS-########'),
            'ticket' => $this->faker->randomNumber(),
            'venta' => $this->faker->randomFloat(2, 100, 1000),
            'utilidad' => $this->faker->randomFloat(2, 10, 100),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
