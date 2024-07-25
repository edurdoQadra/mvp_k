<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PersonResource extends JsonResource
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
            'dni' => $this->dni,
            'departamento'  => $this->departamento,
            'codigo_cliente'=> $this->codigo_cliente,
            'codigo_sede'=> $this->codigo_sede,
            'provincia'  => $this->provincia,
            'estado' => $this->estado,
            'distrito' => $this->distrito,
            'direccion'  => $this->direccion,
            'celular'  => $this->celular,
            'ruc'  => $this->ruc,
            'razon_social' => $this->razon_social,
            'correo'  => $this->correo,

        ];
    }
}
