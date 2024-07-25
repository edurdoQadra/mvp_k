<?php

namespace Database\Seeders;

use App\Models\Alerta;
use Illuminate\Database\Seeder;

class AlertasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Alerta::factory()->count(20)->create();
    }
}
