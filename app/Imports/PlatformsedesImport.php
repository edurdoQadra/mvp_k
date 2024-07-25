<?php

namespace App\Imports;

use App\Models\Platformsede;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PlatformsedesImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new Platformsede([

            'plataforma' => $row['plataforma'],
            'codigo_sede' => $row['codigo_sede'],
            'codigo_plataforma' => $row['codigo_plataforma'],

            'codigo_plataforma' => $row['codigo_plataforma'],

            // Continúa con todos los campos que tienes en tu tabla Cliente
        ]);
    }
}
