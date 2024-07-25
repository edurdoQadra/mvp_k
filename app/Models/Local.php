<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Local extends Model
{
    use HasFactory;

    protected $table = 'detalle_sede'; // Nombre de la tabla en la base de datos

    protected $fillable = [
            'codigo' => '',
            'grupo' => '',
            'administrador' => '',
            'dni' => '',
            'ruc' => '',
            'asociado' => '',
            'modelo' => '',
            'fachada' => '',
            'interior_del_local' => '',
            'garantia' => '',
            'numero_operacion' => '',
            'monto_garantia' => '',
            'tipo_negocio' => '',
            'estado' => '',
            'detalle_nombre' => '',
            'agente_encargado_de_venta' => '',                
    ];
    
   

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at'=>'datetime'
    ];

    protected $primaryKey = 'id'; // Nombre de la clave primaria
}
