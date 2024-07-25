<?php

namespace App\Http\Controllers\Dashboard;
use Illuminate\Http\Request;
use Inertia\Inertia;

use App\Http\Controllers\Controller;
use App\Http\Resources\LocalResource; 
use App\Models\Locationlocal;
use App\Models\Utility;


class DashboardController extends Controller
{
    public function index()
    {

        $ubicaciones = Locationlocal::all();    
        $ubicacionesFormateados = LocalResource::collection($ubicaciones);
//ventas
        $ventas = Locationlocal::all();    
        $ventasFormateados = LocalResource::collection($ventas);

    // esto sacar de la tabla utilidad
    //monto
    $utilidad = Locationlocal::all();    
    $montoFormateados = LocalResource::collection($utilidad);
    
    //tickets
    $tickets = Locationlocal::all();    
    $ticketsFormateados = LocalResource::collection($tickets);
    
    return response()->json($ubicacionesFormateados);
             
        
    }
    //
    public function filterByDate(Request $request)
    {
        $fecha = $request->input('fecha');

        $clientes = Locationlocal::whereDate('created_at', $fecha)->get();

        return response()->json([
            'clientes' => LocalResource::collection($clientes)
        ]);
    }
    //
    public function filterByDateRange(Request $request)
    {
        $fechaInicio = $request->input('fecha_inicio');
        $fechaFin = $request->input('fecha_fin');

        $clientes = Locationlocal::whereDate('created_at', '>=', $fechaInicio)
                            ->whereDate('created_at', '<=', $fechaFin)
                            ->get();

        return response()->json([
            'clientes' => LocalResource::collection($clientes)
        ]);
    }
     // filtro por sede
     public function filterByStore(Request $request)
     {
         $fecha = $request->input('fecha');
 
         $clientes = Locationlocal::whereDate('created_at', $fecha)->get();
 
         return response()->json([
             'clientes' => LocalResource::collection($clientes)
         ]);
     }
     // filtro por plataforma
     public function filterByPlatform(Request $request)
     {
         $fechaInicio = $request->input('fecha_inicio');
         $fechaFin = $request->input('fecha_fin');
 
         $clientes = Locationlocal::whereDate('created_at', '>=', $fechaInicio)
                             ->whereDate('created_at', '<=', $fechaFin)
                             ->get();
 
         return response()->json([
             'clientes' => LocalResource::collection($clientes)
         ]);
     }
    
}
