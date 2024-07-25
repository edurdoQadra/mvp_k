<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Platformsede extends Model
{
    use HasFactory;

    protected $table = 'plataformas_sede'; // Nombre de la tabla en la base de datos

    protected $fillable = [
               // 'codigo_sede' => '',
                'id'=>'',
               	'codigo_'=>'',
                'sede'=>'',
                'codigo_plataforma'=>'',
                'codigo_cliente'=>'',

               
    ];  

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at'=>'datetime'
    ];

    protected $primaryKey = 'id'; // Nombre de la clave primaria
}
