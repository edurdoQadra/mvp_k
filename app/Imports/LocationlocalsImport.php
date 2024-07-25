<?php

namespace App\Imports;

use App\Models\Locationlocal;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class LocationlocalsImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new Locationlocal([
            'codigo_sede' => $row['codigo_sede'],
            'nombre_sede' => $row['nombre_sede'],
            'medio_de_contacto' => $row['medio_de_contacto'],

            'longitud' => $row['longitud'],
            'administrador' => $row['administrador'],
            'estado' => $row['estado'],

            'reporte' => $row['reporte'],
           
            // Continúa con todos los campos que tienes en tu tabla Cliente
        ]);
    }
}
