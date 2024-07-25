<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Asociado>
 */
class InteresadosFactory extends Factory
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
            'dni' => $this->faker->unique()->numerify('########'),
            'medio_de_contacto' => $this->faker->randomElement(['Teléfono', 'Correo', 'Presencial']),
            'medio_de_respuesta' => $this->faker->randomElement(['Teléfono', 'Correo', 'Presencial']),
            'como_llego_a_la_marca' => $this->faker->sentence(),
            'tipo_negocio' => $this->faker->randomElement(['Venta', 'Servicio']),
            'producto_o_servicio' => $this->faker->word(),
            'estado' => $this->faker->randomElement(['Nuevo', 'Contactado', 'No contactado']),
            'respuesta_asesor' => $this->faker->sentence(),
            'primer_contacto' => $this->faker->date(),
            'segundo_contacto' => $this->faker->date(),
            'tercer_contacto' => $this->faker->date(),
            'contacto' => $this->faker->name(),
            'realizo_la_venta' => $this->faker->boolean(),
            'futuro_socio' => $this->faker->boolean(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
