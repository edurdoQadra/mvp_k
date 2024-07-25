<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ClienteResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        //return parent::toArray($request);

        return [            
            'id' => $this->id,
            'fecha' => $this->fecha,
            'dni'  => $this->dni,
            'medio_de_contacto'  => $this->medio_de_contacto,
            'medio_de_respuesta'  => $this->medio_de_respuesta,
            'como_llego_a_la_marca' => $this->como_llego_a_la_marca,
            'tipo_negocio' => $this->tipo_negocio,
            'estado'  => $this->estado,
            'respuesta_asesor'  => $this->respuesta_asesor,
            'primer_contacto'  => $this->primer_contacto,
            'segundo_contacto' => $this->segundo_contacto,
            'tercer_contacto' => $this->tercer_contacto,
            'contacto' => $this->contacto,
            'realizo_la_venta' => $this->realizo_la_venta,
            'futuro_socio' => $this->futuro_socio,
        ];
    }
}
