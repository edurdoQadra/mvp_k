<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;

    protected $table = 'datos_personales'; // Nombre de la tabla en la base de datos

    protected $fillable = [
        'id',
        'dni',
        'departamento',
        'codigo_cliente',
        'codigo_sede',
        'provincia',
        'distrito',
        'direccion',
        'celular',
        'ruc',
        'razon_social',
        'correo',    
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at'=>'datetime'
    ];

    protected $primaryKey = 'id'; // Nombre de la clave primaria
}
