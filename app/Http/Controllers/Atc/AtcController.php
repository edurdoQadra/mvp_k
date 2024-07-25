<?php

namespace App\Http\Controllers\Atc;

use App\Http\Controllers\Controller;
// Importar el recurso ClienteResource
use Illuminate\Http\Request;
use Inertia\Inertia;
/***/
use App\Http\Resources\StoreResource; // Import PersonResource
use App\Http\Resources\ClienteResource; 
use App\Models\Local;
use App\Models\Cliente;
use Illuminate\Http\JsonResponse;
/***/
use App\Http\Resources\PersonResource; // Import PersonResource
use App\Models\Person;

class AtcController extends Controller
{
    public function index()
    {
        $clientes = Cliente::all();
        $personas = Person::all();
        $locales = Local::all();

        return Inertia::render('Admin/Modules/Atc', [
            'locales' => StoreResource::collection($locales),
            'clientes' => ClienteResource::collection($clientes),
            'personas' => PersonResource::collection($personas)
        ]);                  
    }
}


        //Obtener todos los clientes
        // $clientes = Cliente::all();        
        // Formatear los clientes usando ClienteResource
        // $clientesFormateados = ClienteResource::collection($clientes);
        // // Devolver los clientes formateados como una respuesta JSON
        // return response()->json($clientesFormateados);