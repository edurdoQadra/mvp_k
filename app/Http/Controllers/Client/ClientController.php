<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Resources\ClienteResource; // Importar el recurso ClienteResource
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;
use App\Models\Cliente;
use Illuminate\Http\JsonResponse;
//
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ClientsImport; 

class ClientController extends Controller
{

    public function index() 
    {
        $clientes = Cliente::all();
        return Inertia::render('Admin/Clients/Index', [
            'clientes' => ClienteResource::collection($clientes)
        ]);

        // // Obtener todos los clientes
        // $clientes = Cliente::all();        
        // // Formatear los clientes usando ClienteResource
        // $clientesFormateados = ClienteResource::collection($clientes);
        // // Devolver los clientes formateados como una respuesta JSON
        // return response()->json($clientesFormateados);
    }

    public function store(Request $request)
    {                
         //return response()->json(['message' => 'Error al crear el cliente', ], 200);

        // $request->validate([
        //     'fecha'=> 'string',
        //     'dni'=> 'string',
        //     'medio_de_contacto'=> 'string',
        //     'medio_de_respuesta'=> 'string',
        //     'como_llego_a_la_marca'=> 'string',
        //     'tipo_negocio'=> 'string',
        //     'producto_o_servicio'=> 'string',    
        //     'estado'=> 'string',
        //     'respuesta_asesor'=> 'string',
        //     'primer_contacto'=> 'string',
        //     'segundo_contacto'=> 'string',
        //     'tercer_contacto'=> 'string',
        //     'contacto'=> 'string',
        //     'realizo_la_venta'=> 'string',
        //     'futuro_socio' => 'string',
        // ]);  

        // Intenta crear el cliente
        try {
            $registro = Cliente::create($request->all());
            return response()->json(['message' => 'Cliente creado satisfactoriamente'], 201);
        } catch (\Exception $e) {
        // En caso de error, retorna un mensaje de error
            return response()->json(['message' => 'Error al crear el cliente', 'error' => $e->getMessage()], 500);
        }

    }
    
    public function update(Request $request, $id)
    {

        // $request->validate([
        //     'fecha'=> 'string',
        //     'dni'=> 'string',
        //     'medio_de_contacto'=> 'string',
        //     'medio_de_respuesta'=> 'string',
        //     'como_llego_a_la_marca'=> 'string',
        //     'tipo_negocio'=> 'string',
        //     'producto_o_servicio'=> 'string',    
        //     'estado'=> 'string',
        //     'respuesta_asesor'=> 'string',
        //     'primer_contacto'=> 'string',
        //     'segundo_contacto'=> 'string',
        //     'tercer_contacto'=> 'string',
        //     'contacto'=> 'string',
        //     'realizo_la_venta'=> 'string',
        //     'futuro_socio' => 'string',
        // ]);  

       // dd($request);
        //Obtener el cliente por su ID

        $cliente = Cliente::find($id);    

        if (!$cliente) {
            $message = 'Cliente no encontrado';
            return response()->json([
                'message' => $message,
                'status' => 404
            ]);
        }    
        // Actualizar los datos del cliente
        $cliente->update($request->all());    
        $message = 'Cliente actualizado satisfactoriamente';    
        return response()->json([
            'message' => $message,
            'status' => 200
        ]);

    }   
    
    public function destroy($id)
    {
        $cliente = Cliente::findOrFail($id);
        // Aquí podrías agregar la validación de autorización si es necesario
        try {
            $cliente->delete();
            return redirect()->route('clients.index')->with('success', 'Cliente eliminado correctamente.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Ha ocurrido un error al eliminar el cliente.');
        }
    }
    
    public function filterByDate(Request $request)
    {
        $fecha = $request->input('fecha');

        $clientes = Cliente::whereDate('created_at', $fecha)->get();

        return response()->json([
            'clientes' => ClienteResource::collection($clientes)
        ]);
    }

    public function filterByDateRange(Request $request)
    {
        $fechaInicio = $request->input('fecha_inicio');
        $fechaFin = $request->input('fecha_fin');

        $clientes = Cliente::whereDate('created_at', '>=', $fechaInicio)
                            ->whereDate('created_at', '<=', $fechaFin)
                            ->get();

        return response()->json([
            'clientes' => ClienteResource::collection($clientes)
        ]);
    }
   
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:xlsx,xls', // Validar que el archivo sea de tipo Excel
        ]);

        try {
            // Obtener el archivo subido
            $file = $request->file('file');

            // Importar los datos del archivo Excel usando la clase ClientsImport
            Excel::import(new ClientsImport, $file);

            return response()->json(['message' => 'Archivo importado correctamente'], 200);
        } catch (\Exception $e) {
            // En caso de error, retornar un mensaje de error
            return response()->json(['message' => 'Error al importar el archivo', 'error' => $e->getMessage()], 500);
        }
    }    

}



// consultar en caso sea necesario guardar estos archivos
// public function import(Request $request)
// {
//     $request->validate([
//         'file' => 'required|file|mimes:xlsx,xls', // Validar que el archivo sea de tipo Excel
//     ]);
//     // Obtener el archivo subido
//     $file = $request->file('file');
//     try {
//         // Almacenar el archivo en la carpeta storage/app/importaciones
//         $filePath = Storage::putFile('importaciones', $file);
//         // Importar los datos del archivo Excel usando la clase ClientsImport
//         Excel::import(new ClientsImport, $filePath);
//         return response()->json(['message' => 'Archivo importado correctamente'], 200);
//     } catch (\Exception $e) {
//         // En caso de error, retornar un mensaje de error
//         return response()->json(['message' => 'Error al importar el archivo', 'error' => $e->getMessage()], 500);
//     }
// }