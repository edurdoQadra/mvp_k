<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UbicacionSede>
 */
class UbicacionSedeFactory extends Factory
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
            'nombre_sede' => $this->faker->company(),
            'latitud' => $this->faker->latitude(),
            'longitud' => $this->faker->longitude(),
            'administrador' => $this->faker->name(),
            'estado' => $this->faker->randomElement(['Activo', 'Inactivo']),
            'reporte' => $this->faker->sentence(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
