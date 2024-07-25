<?php

namespace App\Http\Controllers\King;

use App\Http\Controllers\Controller;
/***/
/***/
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Http\JsonResponse;

/***/
/***/
use App\Http\Resources\ClienteResource; // Import PersonResource
use App\Http\Resources\LocallocationResource;             
use App\Http\Resources\LocalResource; // Import PersonResource
use App\Http\Resources\PersonResource; 
use App\Http\Resources\PlatformResource; // Import PersonResource
use App\Http\Resources\PlatformsedeResource; 
use App\Http\Resources\StoreResource; // Import PersonResource
use App\Http\Resources\TransactiondetailResource; 
use App\Http\Resources\TransactionResource; 
use App\Http\Resources\UtilityResource; 
/***/
/***/
use App\Models\Cliente;
use App\Models\Person;
use App\Models\Local;
use App\Models\Locationlocal;
use App\Models\Platform;
use App\Models\Platformsede;
use App\Models\Transaction;
use App\Models\Transactiondetail;
use App\Models\Utility;
use App\Models\Asociado;

/***/
/***/

class KingController extends Controller
{
    public function index()
        {
        // $transactionF =TransactionResource::collection($transaction);

            $clientes = Cliente::all();
            $personas = Person::all();
            $locales = Local::all();
            $locationlocal = Locationlocal::all();
            $platforms= Platform::all();
            $platformsede= Platformsede::all();
            $transacciones = Transaction::all();
            $transactiondetail= Transactiondetail::all();
            $utility= Utility::all();
            $socios = Asociado::all();

          //  Agrupar todos los datos en un array asociativo
            // $datos = [
            // 'clientes' => $clientes,
            // 'personas' => $personas,
            // 'locales' => $locales,
            // 'locationlocal' => $locationlocal,
            // 'platforms' => $platforms,
            // 'platformsedes' => $platformsede,
            // 'transacciones' => $transacciones,
            // 'detallesTransaccion' => $transactiondetail,
            // 'utilities' => $utility,
            // ];

// Devolver los datos como respuesta JSON
//return response()->json($datos);


        return Inertia::render('Admin/Modules/Administracion', [
            'clientes' => ClienteResource::collection($clientes),
            'personas' => PersonResource::collection($personas),
            'locales' => StoreResource::collection($locales),
            'locationlocal' => LocallocationResource::collection($locationlocal),
            'platform' => PlatformResource::collection($platforms),
            'platformsede' => PlatformsedeResource::collection($platformsede),
            'transaction' => TransactionResource::collection($transacciones),
            'transactiondetail' => TransactiondetailResource::collection($transactiondetail),
            'utility' => UtilityResource::collection($utility),
            'socios' => UtilityResource::collection($socios),
        ]);                  
     }
}


// // Obtener todos los clientes
// $clientes = Cliente::all();        
// // Formatear los clientes usando ClienteResource
// $clientesFormateados = ClienteResource::collection($clientes);
// // Devolver los clientes formateados como una respuesta JSON
// return response()->json($clientesFormateados);