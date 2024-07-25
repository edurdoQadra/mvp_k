<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array<int, string> 
     */
    //permitir hacer test a travez de estas rutas listadas ...
    
    protected $except = [
        'platforms/*',
        'clients/*',
        'persons/*',
        'stores/*',
        'transatcion/*',
        'transactiondetail/*',
        'utility/*',
        'locationlocal/*',
        'platformstore/*', // Excluye todas las rutas bajo /clients
        'supadmin/*',
        'atc/*',
        'contabilidad/*', // Excluye todas las rutas bajo /clients
        'soporte/*',

        
        
    ];
}