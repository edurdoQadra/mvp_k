<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(RoleSeeder::class);
        $this->call(AdminSeeder::class);

        $this->call(AlertasSeeder::class);
        $this->call(ClientesSeeder::class);

        $this->call(DatosPersonalesSeeder::class);
        $this->call(DetalleSedeSeeder::class);

        $this->call(DetalleTransaccionesSeeder::class);
        $this->call(InteresadosSeeder::class);

        $this->call(PlataformaSeeder::class);
        $this->call(PlataformasSedeSeeder::class);

        $this->call(TransaccionesSeeder::class);
        $this->call(UbicacionSedeSeeder::class);

        $this->call(UtilidadSeeder::class);

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

          // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);


    }
}
