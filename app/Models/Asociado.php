<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asociado extends Model
{
    use HasFactory;

    protected $table = 'clientes'; // Nombre de la tabla en la base de datos

    protected $fillable = [
        
        'id',	
        'codigo_sede', 
        'dni',
        'fecha_implementacion',	
        'estado',
        'instalacion',
        'motivo_bloqueo',
        'estado_instalacion',
        'solicitud_bloqueo',
        'codigo_cliente',  

    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at'=>'datetime'
    ];

    protected $primaryKey = 'ID'; // Nombre de la clave primaria
}
