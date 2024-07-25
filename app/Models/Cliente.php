<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $table = 'interesados'; // Nombre de la tabla en la base de datos

    protected $fillable = [
        'id',
        'fecha',
        'dni',
        'medio_de_contacto',
        'medio_de_respuesta',
        'como_llego_a_la_marca',
        'tipo_negocio',
        'producto_o_servicio',	
        'estado',
        'respuesta_asesor',
        'primer_contacto',
        'segundo_contacto',
        'tercer_contacto',
        'contacto',
        'realizo_la_venta',
        'futuro_socio'       

    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at'=>'datetime'
    ];

    protected $primaryKey = 'id'; // Nombre de la clave primaria
}
