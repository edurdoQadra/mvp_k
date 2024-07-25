<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StoreResource extends JsonResource
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
            'codigo' => $this->codigo,
            'grupo' => $this->grupo,
            'administrador' => $this->administrador,
            'dni' => $this->dni,
            'ruc' => $this->ruc,
            'asociado' => $this->asociado,
            'modelo' => $this->modelo,
            'fachada' => $this->fachada,
            'interior_del_local' => $this->interior_del_local,
            'garantia' => $this->garantia,
            'numero_operacion' => $this->numero_operacion,
            'monto_garantia' => $this->monto_garantia,
            'tipo_negocio' => $this->tipo_negocio,
            'estado' => $this->estado,
            'detalle_nombre' => $this->detalle_nombre,
            'agente_encargado_de_venta' => $this->agente_encargado_de_venta,
        ];
        
    }
}
