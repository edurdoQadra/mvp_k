<?php

namespace App\Imports;

use App\Models\Transactiondetail;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class TransactiondetailsImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new Transactiondetail([
            'porcentaje_c_v' => $row['porcentaje_c_v'],
            'plataforma_id' => $row['plataforma_id'],
            'codigo_sede' => $row['codigo_sede'],

            'codigo_transaccion' => $row['codigo_transaccion'],
            // Continúa con todos los campos que tienes en tu tabla Cliente
        ]);
    }
}
