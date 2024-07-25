<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LocalResource  extends JsonResource
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
            'nombre_sede' => $this->nombre_sede,
            'latitud' => $this->latitud,
            'longitud' => $this->longitud,
            'administrador' => $this->administrador,
            'estado' => $this->estado,
        ];        
    }
}
