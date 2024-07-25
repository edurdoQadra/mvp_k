<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UtilityResource extends JsonResource
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
        'codigo_sede'=>$this->codigo_sede	,
        'plataforma_id'=>$this->plataforma_id,
        'juego'=>$this->juego ,   
       'periodo' => $this->periodo,
        'plataforma_id' => $this->plataforma_id,
        'administrador' => $this->administrador,
        'sede_id' =>$this->sede_id ,
        'razon_social' => $this->razon_social,
        'ruc' => $this->ruc,
        'utilidad_bruta_100' => $this->utilidad_bruta_100,
        'impuesto_12' =>$this->impuesto_12 ,
        'utilidad_impuesto' => $this->utilidad_impuesto,
        'porcentaje_base' => $this->porcentaje_base,
        'utilidad_neta' =>$this->utilidad_neta ,
        'total_a_depositar' => $this->total_a_depositar,
        'pago' => $this->pago,
        'porcentaje_com_adm' => $this->porcentaje_com_adm,
        'porcentaje_participacion' => $this->porcentaje_participacion,
        'documento_atribucion' => $this->documento_atribucion,
                        
        ];
    }
}



