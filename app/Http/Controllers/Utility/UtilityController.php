<?php

namespace App\Http\Controllers\Utility;

use App\Http\Controllers\Controller;
use App\Http\Resources\UtilityResource; // Import PersonResource
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Utility;

class UtilityController extends Controller
{
    public function index()
    {
        return Inertia::render('Admin/Utilitys/Index', [
            'utilidades' => UtilityResource::collection(Utility::all())
        ]);            
        
    //    //Obtener todos los clientes
    //     $utilidades = Utility::all();        
    //     //Formatear los clientes usando ClienteResource
    //     $utilidadesFormateados = UtilityResource::collection($utilidades);
    //    // Devolver los clientes formateados como una respuesta JSON
    //     return response()->json($utilidadesFormateados);
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
        $utilidades = Utility::create($request->all());

    $mensaje = "Este es un mensaje de texto simple desde un controlador de Laravel.";
    return response($mensaje, 200)
        ->header('Content-Type', 'text/plain');          

      if ($utilidades) {
        $message = 'utilidades creado satisfactoriamente';
    
        return response()->json([
            'message' => $message,
           'status' => 200
        ]);
          }else{
            $message = 'utilidades no fue creado satisfactoriamente';
    
            return response()->json([
                'message' => $message,
               'status' => 404
            ]);
          }
     
       return redirect()->route('clients.index');
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
        $utilidades = Utility::find($id);
    
        if (!$utilidades) {
            $message = 'utilidades no encontrado';
            return response()->json([
                'message' => $message,
                'status' => 404
            ]);
        }
    
        // Actualizar los datos del cliente
        $utilidades->update($request->all());
    
        $message = 'utilidades actualizado satisfactoriamente';
    
        return response()->json([
            'message' => $message,
            'status' => 200
        ]);
    }   
    
    public function destroy($id)
    {
        $utilidades = Utility::findOrFail($id);
        // Aquí podrías agregar la validación de autorización si es necesario
        try {
            $utilidades->delete();
            return redirect()->route('clients.index')->with('success', 'utilidades eliminado correctamente.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Ha ocurrido un error al eliminar el cliente.');
        }
    }    

    public function filterByDate(Request $request)
    {
        $fecha = $request->input('fecha');

        $clientes = Utility::whereDate('created_at', $fecha)->get();

        return response()->json([
            'clientes' => UtilityResource::collection($clientes)
        ]);
    }

    public function filterByDateRange(Request $request)
    {
        $fechaInicio = $request->input('fecha_inicio');
        $fechaFin = $request->input('fecha_fin');

        $clientes = Utility::whereDate('created_at', '>=', $fechaInicio)
                            ->whereDate('created_at', '<=', $fechaFin)
                            ->get();

        return response()->json([
            'clientes' => UtilityResource::collection($clientes)
        ]);
    }

}
