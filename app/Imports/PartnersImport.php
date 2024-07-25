<?php

namespace App\Imports;

use App\Models\Asociado;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PartnersImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new Asociado([
            'codigo_sede' => $row['fecha'],
            'dni' => $row['dni'],
            'fecha_implementacion' => $row['medio_de_contacto'],

            'estado' => $row['estado'],
            'instalacion' => $row['instalacion'],
            'motivo_bloqueo' => $row['motivo_bloqueo'],

            'estado_instalacion' => $row['estado_instalacion'],
            'solicitud_bloqueo' => $row['solicitud_bloqueo'],
            'codigo_cliente' => $row['codigo_cliente'],
            // Continúa con todos los campos que tienes en tu tabla Cliente
        ]);
    }
}

