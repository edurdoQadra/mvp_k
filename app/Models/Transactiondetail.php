<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transactiondetail extends Model
{
    use HasFactory;

    protected $table = 'detalle_transacciones'; // Nombre de la tabla en la base de datos

    protected $fillable = [   
        'id'=>'',
        'porcentaje_c_v'=>''	,
        'plataforma_id'=>'',
        'codigo_sede'=>''                       
    ];
    
   

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at'=>'datetime'
    ];

    protected $primaryKey = 'ID'; // Nombre de la clave primaria
}
