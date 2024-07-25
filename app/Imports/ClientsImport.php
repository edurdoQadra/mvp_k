<?php

namespace App\Imports;

use App\Models\Cliente;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ClientsImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new Cliente([
            'fecha' => $row['fecha'],
            'dni' => $row['dni'],
            'medio_de_contacto' => $row['medio_de_contacto'],
            
            'medio_de_respuesta' => $row['medio_de_respuesta'],
            'como_llego_a_la_marca' => $row['como_llego_a_la_marca'],
            'tipo_negocio' => $row['tipo_negocio'],

            'producto_o_servicio' => $row['producto_o_servicio'],
            'estado' => $row['estado'],
            'respuesta_asesor' => $row['respuesta_asesor'],

            'primer_contacto' => $row['primer_contacto'],
            'segundo_contacto' => $row['segundo_contacto'],
            'tercer_contacto' => $row['tercer_contacto'],

            'contacto' => $row['contacto'],
            'realizo_la_venta' => $row['realizo_la_venta'],
            'futuro_socio' => $row['futuro_socio'],

            // Continúa con todos los campos que tienes en tu tabla Cliente
        ]);
    }
}
