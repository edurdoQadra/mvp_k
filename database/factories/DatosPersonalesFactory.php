<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DatosPersonales>
 */
class DatosPersonalesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'dni' => $this->faker->unique()->numerify('########'),
            'departamento' => $this->faker->state(),
            'codigo_cliente' => $this->faker->unique()->numerify('CLI-########'),
            'codigo_sede' => 'Sede001',
            'provincia' => $this->faker->city(),
            'distrito' => $this->faker->citySuffix(),
            'direccion' => $this->faker->address(),
            'celular' => $this->faker->phoneNumber(),
            'ruc' => $this->faker->unique()->numerify('###########'),
            'razon_social' => $this->faker->company(),
            'correo' => $this->faker->email(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
