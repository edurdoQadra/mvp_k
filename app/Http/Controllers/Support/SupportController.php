<?php

namespace App\Http\Controllers\Support;

use App\Http\Controllers\Controller;
use App\Http\Resources\AlertaResource; // Import AlertaResource
use App\Http\Resources\ClienteResource; // Import PersonResource
use Illuminate\Http\Request;
use Inertia\Inertia;

use App\Models\Cliente;
use App\Models\Alerta;


class SupportController extends Controller
{
    public function index()
    {
    $clientes = Cliente::all();        
    $clientesFormateados = ClienteResource::collection($clientes);
    $alertas = Alerta::all();        
    $alertasFormateados = AlertaResource::collection($alertas);

    // Retornar una respuesta utilizando Inertia para la renderización en el frontend
    return Inertia::render('Admin/Modules/Soporte', [
        'clientes' => $clientesFormateados,
        'alertas' => $alertasFormateados
    ]);

   // Si deseas probar las consultas y devolver JSON, puedes descomentar el siguiente código:
    // $locales = Local::all();        
    // $localesFormateados = StoreResource::collection($locales);
    // $alertas = Alert::all();        
    // $alertasFormateados = AlertaResource::collection($alertas);
   // return response()->json($localesFormateados );

    //return response()->json( $alertasFormateados);
}

       
    public function store(Request $request)
    {
        // $request->validate([           
        //     'fecha' => 'date',
        //     'dni' => 'string',
        //     'medio_de_contacto' => 'string',
        //     'medio_de_respuesta' => 'string',
        //     'como_llego_a_la_marca' => 'string',
        //     'tipo_negocio' => 'string',
        //     'estado' => 'string',
        //     'respuesta_asesor' => 'string',
        //     'primer_contacto' => 'string',
        //     'segundo_contacto' => 'string',
        //     'tercer_contacto' => 'string',
        //     'contacto' => 'string',
        //     'realizo_la_venta' => 'string',
        //     'futuro_socio' => 'string',
        // ]);

    //    dd($request->all()); 
       // Crear el cliente si pasa todas las validaciones
        $stores = Local::create($request->all());

    $mensaje = "Este es un mensaje de texto simple desde un controlador de Laravel.";
    return response($mensaje, 200)
        ->header('Content-Type', 'text/plain');          

      if ($stores) {
        $message = 'Cliente creado satisfactoriamente';
    
        return response()->json([
            'message' => $message,
           'status' => 200
        ]);
          }else{
            $message = 'Cliente no fue creado satisfactoriamente';
    
            return response()->json([
                'message' => $message,
               'status' => 404
            ]);
          }
     
       return redirect()->route('platforms.index');
    }

    public function update(Request $request, $id)
    {
        $request->validate([           
            'fecha' => 'date',
            'dni' => 'string',
            'medio_de_contacto' => 'string',
            'medio_de_respuesta' => 'string',
            'como_llego_a_la_marca' => 'string',
            'tipo_negocio' => 'string',
            'producto_o_servicio' => 'string',
            'estado' => 'string',
            'respuesta_asesor' => 'string',
            'primer_contacto' => 'string',
            'segundo_contacto' => 'string',
            'tercer_contacto' => 'string',
            'contacto' => 'string',
            'realizo_la_venta' => 'string',
            'futuro_socio' => 'string',
        ]);
    
        // Obtener el cliente por su ID
        $stores = Local::find($id);
    
        if (!$stores) {
            $message = 'Cliente no encontrado';
            return response()->json([
                'message' => $message,
                'status' => 404
            ]);
        }
    
        // Actualizar los datos del cliente
        $stores->update($request->all());
    
        $message = 'Cliente actualizado satisfactoriamente';
    
        return response()->json([
            'message' => $message,
            'status' => 200
        ]);
    }   
    
    public function destroy($id)
    {
        $stores = Local::findOrFail($id);
        // Aquí podrías agregar la validación de autorización si es necesario
        try {
            $stores->delete();
            return redirect()->route('clients.index')->with('success', 'Cliente eliminado correctamente.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Ha ocurrido un error al eliminar el cliente.');
        }
    }

      
    public function filterByDate(Request $request)
    {
        $fecha = $request->input('fecha');

        $stores = Local::whereDate('created_at', $fecha)->get();

        return response()->json([
            'clientes' => StoreResource::collection($stores)
        ]);
    }

    public function filterByDateRange(Request $request)
    {
        $fechaInicio = $request->input('fecha_inicio');
        $fechaFin = $request->input('fecha_fin');

        $stores = Local::whereDate('created_at', '>=', $fechaInicio)
                            ->whereDate('created_at', '<=', $fechaFin)
                            ->get();

        return response()->json([
            'clientes' => StoreResource::collection($stores)
        ]);
    }

}
