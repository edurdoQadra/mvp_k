<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Utilidad>
 */
class UtilidadFactory extends Factory
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
            'plataforma_id' => $this->faker->randomNumber(),
            'juego' => $this->faker->word(),
            'periodo' => $this->faker->randomElement(['2023', '2024', '2025']),
            'administrador' => $this->faker->name(),
            'sede_id' => $this->faker->unique()->numerify('SEDE-########'),
            'razon_social' => $this->faker->company(),
            'ruc' => $this->faker->unique()->numerify('###########'),
            'utilidad_bruta_100' => $this->faker->randomFloat(2, 100, 1000),
            'impuesto_12' => $this->faker->randomFloat(2, 10, 100),
            'utilidad_impuesto' => $this->faker->randomFloat(2, 100, 1000),
            'porcentaje_base' => $this->faker->randomFloat(2, 0, 100),
            'utilidad_neta' => $this->faker->randomFloat(2, 100, 1000),
            'total_a_depositar' => $this->faker->randomFloat(2, 100, 1000),
            'pago' => $this->faker->randomFloat(2, 100, 1000),
            'porcentaje_com_adm' => $this->faker->randomFloat(2, 0, 10),
            'com_adm_s' => $this->faker->randomFloat(2, 10, 100),
            'porcentaje_participacion' => $this->faker->randomFloat(2, 0, 100),
            'documento_atribucion' => $this->faker->word(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
