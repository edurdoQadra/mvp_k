<?php

namespace App\Imports;

use App\Models\Local;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class LocalsImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new Local([

            'codigo_sede' => $row['codigo_sede'],
            'codigo_cliente' => $row['codigo_cliente'],
            'nombre_sede' => $row['nombre_sede'],

            'grupo' => $row['grupo'],
            'administrador' => $row['administrador'],
            'dni' => $row['dni'],

            'ruc' => $row['ruc'],
            'asociado' => $row['asociado'],
            'modelo' => $row['modelo'],

            'fachada' => $row['fachada'],
            'interior_del_local' => $row['interior_del_local'],
            'garantia' => $row['garantia'],

            'numero_operacion' => $row['numero_operacion'],
            'monto_garantia' => $row['monto_garantia'],
            'tipo_negocio' => $row['tipo_negocio'],

            'estado' => $row['estado'],
            'detalle_nombre' => $row['detalle_nombre'],
            'agente_encargado_de_venta' => $row['agente_encargado_de_venta'],

            // Continúa con todos los campos que tienes en tu tabla Cliente

        ]);
    }
}
