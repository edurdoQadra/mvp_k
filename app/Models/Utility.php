<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Utility extends Model
{
    use HasFactory;

    protected $table = 'utilidad'; // Nombre de la tabla en la base de datos

    protected $fillable = [   
        'id'=>'',
        'codigo_sede'=>''	,
        'plataforma_id'=>'',
        'juego'=>'' ,   
       'periodo' => '',
        'plataforma_id' => '',
        'administrador' => '',
        'sede_id' =>'' ,
        'razon_social' => '',
        'ruc' => '',
        'utilidad_bruta_100' => '',
        'impuesto_12' =>'' ,
        'utilidad_impuesto' => '',
        'porcentaje_base' => '',
        'utilidad_neta' =>'' ,
        'total_a_depositar' => '',
        'pago' => '',
        'porcentaje_com_adm' => '',
        'porcentaje_participacion' => '',
        'documento_atribucion' => '',
        
    ];
    
   

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at'=>'datetime'
    ];

    protected $primaryKey = 'ID'; // Nombre de la clave primaria
}
