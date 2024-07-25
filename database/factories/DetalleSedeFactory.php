<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DetalleSede>
 */
class DetalleSedeFactory extends Factory
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
            'codigo_cliente' => $this->faker->unique()->numerify('CLI-########'),
            'nombre_sede' => $this->faker->company(),
            'grupo' => $this->faker->randomElement(['Grupo A', 'Grupo B', 'Grupo C']),
            'administrador' => $this->faker->name(),
            'dni' => $this->faker->unique()->numerify('########'),
            'ruc' => $this->faker->unique()->numerify('###########'),
            'asociado' => $this->faker->name(),
            'modelo' => $this->faker->word(),
            'fachada' => $this->faker->word(),
            'interior_del_local' => $this->faker->word(),
            'garantia' => $this->faker->randomFloat(2, 100, 1000),
            'numero_operacion' => $this->faker->unique()->numerify('#####'),
            'monto_garantia' => $this->faker->randomFloat(2, 100, 1000),
            'tipo_negocio' => $this->faker->randomElement(['Venta', 'Servicio']),
            'estado' => $this->faker->randomElement(['Activo', 'Inactivo']),
            'detalle_nombre' => $this->faker->word(),
            'agente_encargado_de_venta' => $this->faker->name(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
