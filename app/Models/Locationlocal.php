<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Locationlocal extends Model
{
    use HasFactory;

    protected $table = 'ubicacion_sede'; // Nombre de la tabla en la base de datos

    protected $fillable = [
                'id'=>'',
                'codigo_sede' => '',
                'nombre_sede' => '',
                'latitud'	  => '',
                'longitud'    => '',	
                'administrador'  => '',	
                'estado'   => '',
                'reporte'  => '',      
    ];  

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at'=>'datetime'
    ];

    protected $primaryKey = 'id'; // Nombre de la clave primaria
}


