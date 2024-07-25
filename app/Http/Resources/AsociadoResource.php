<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PlatformResource extends JsonResource
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
            'codigo_sede' => $this->codigo_sede,
            'dni' => $this->dni,
            'fecha_implementacion' => $this->fecha_implementacion,
            'estado' => $this->estado,
            'instalacion' => $this->instalacion,
            'motivo_bloqueo' => $this->motivo_bloqueo,
            'estado_instalacion' => $this->estado_instalacion,
            'solicitud_bloqueo' => $this->solicitud_bloqueo,
            'codigo_cliente' => $this->codigo_cliente,                      
        ];
    }
}
