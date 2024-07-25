<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Platform extends Model
{
    use HasFactory;

    protected $table = 'plataforma'; // Nombre de la tabla en la base de datos

    protected $fillable = [   
        'id'=>'',
        'plataforma'=>'',
        'codigo_sede'=> '',
        'codigo_plataforma'=> '',                       
    ];   

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at'=>'datetime'
    ];

    protected $primaryKey = 'ID'; // Nombre de la clave primaria
}
