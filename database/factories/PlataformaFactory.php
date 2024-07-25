<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Plataforma>
 */
class PlataformaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'plataforma' => $this->faker->word(),
            'codigo_sede' => 'Sede001',
            'codigo_plataforma' => $this->faker->unique()->numerify('PLAT-########'),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
