<?php

namespace App\Imports;

use App\Models\Transaction;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class TransactionsImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new Transaction([
            'fecha' => $row['fecha'],
            'codigo_sede' => $row['codigo_sede'],
            'codigo_transaccion' => $row['codigo_transaccion'],

            'ticket' => $row['ticket'],
            'venta' => $row['venta'],
            'utilidad' => $row['utilidad'],

            // Continúa con todos los campos que tienes en tu tabla Cliente
        ]);
    }
}


