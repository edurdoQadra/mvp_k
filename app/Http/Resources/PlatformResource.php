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
            'plataforma' => $this->plataforma,
            'codigo_sede' => $this->codigo_sede,
            'codigo_plaforma' => $this->codigo_plaforma,
                     
        ];
    }
}
