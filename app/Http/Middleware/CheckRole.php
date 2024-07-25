<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class CheckRole
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        $user = Auth::user();

        // Verificar si el usuario tiene alguno de los roles especificados
        foreach ($roles as $role) {
            if ($user->hasRole($role)) {
                // Definir la vista correspondiente al rol
                switch ($role) {
                    case 'admin':
                        return Inertia::render('AdminDashboard');
                        break;
                    case 'atencion':
                        return Inertia::render('AtencionDashboard');
                        break;
                    case 'contabilidad':
                        return Inertia::render('ContabilidadDashboard');
                        break;
                    case 'soporte':
                        return Inertia::render('SoporteDashboard');
                        break;
                    default:
                        // Si no se encuentra un rol específico, redirigir o manejar como sea necesario
                        abort(403, 'No tienes permisos para acceder a esta página.');
                        break;
                }
            }
        }

        // Si el usuario no tiene el rol requerido, devolver error 403
        abort(403, 'No tienes permisos para acceder a esta página.');
    }
}


// namespace App\Http\Middleware;

// use Closure;
// use Illuminate\Http\Request;
// use Symfony\Component\HttpFoundation\Response;

// class CheckRole
// {
//     /**
//      * Handle an incoming request.
//      *
//      * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
//      */
//     public function handle(Request $request, Closure $next): Response
//     {
//         return $next($request);
//     }
// }
