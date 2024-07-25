<?php

namespace App\Imports;

use App\Models\Utility;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UtilitysImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new Utility([
            'codigo_sede' => $row['codigo_sede'],
            'plataforma_id' => $row['plataforma_id'],
            'juego' => $row['juego'],

            'periodo' => $row['periodo'],
            'plataforma_id' => $row['plataforma_id'],
            'administrador' => $row['administrador'],

            'sede_id' => $row['sede_id'],
            'razon_social' => $row['razon_social'],
            'ruc' => $row['ruc'],

            'utilidad_bruta_100' => $row['utilidad_bruta_100'],
            'impuesto_12' => $row['impuesto_12'],
            'utilidad_impuesto' => $row['utilidad_impuesto'],

            'porcentaje_base' => $row['porcentaje_base'],
            'utilidad_neta' => $row['utilidad_neta'],
            'total_a_depositar' => $row['total_a_depositar'],

            'pago' => $row['pago'],
            'porcentaje_com_adm' => $row['porcentaje_com_adm'],
            'porcentaje_participacion' => $row['porcentaje_participacion'],

            'documento_atribucion' => $row['documento_atribucion'],
            
            // Continúa con todos los campos que tienes en tu tabla Cliente
        ]);
    }
}

