<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TransactionResource extends JsonResource
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
            'codigo_sede'  => $this->codigo_sede,
            'codigo_transaccion'=>$this->codigo_transaccion,
            'ticket'  => $this->ticket,
            'venta' => $this->venta,
            'utilidad' => $this->utilidad,
          
        ];
    }
}
