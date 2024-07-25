<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AlertaResource extends JsonResource
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
            'mensaje' => $this->mensaje,
                        
        ];
    }
}
        

    
