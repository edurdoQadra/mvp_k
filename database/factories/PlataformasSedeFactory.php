<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PlataformasSede>
 */
class PlataformasSedeFactory extends Factory
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
            'codigo_plataforma' => $this->faker->unique()->numerify('PLAT-########'),
            'codigo_cliente' => $this->faker->unique()->numerify('CLI-########'),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
