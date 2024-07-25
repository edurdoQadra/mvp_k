<?php

namespace App\Imports;

use App\Models\Person;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PersonsImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new Person([
            'fecha' => $row['fecha'],
            'dni' => $row['dni'],
            'medio_de_contacto' => $row['medio_de_contacto'],
            // Continúa con todos los campos que tienes en tu tabla Cliente
        ]);
    }
}
