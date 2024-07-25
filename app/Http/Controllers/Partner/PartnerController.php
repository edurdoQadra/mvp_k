<?php

namespace App\Http\Controllers\Partner;

use App\Http\Controllers\Controller;
use App\Http\Resources\PartnerResource; 
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;
use App\Models\Asociado;
use Illuminate\Http\JsonResponse;
// storage is udsed when we want to safe the file in the proyect it self
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\PartnersImport; 

class PartnerController extends Controller
{

    public function index() {

        $Asociados = Asociado::all();

        return Inertia::render('Admin/Partners/Index', [
            'socios' => PartnerResource::collection($Asociados)
        ]);

        // Obtener todos los clientes
        // // $socios = Asociado::all();        
        // // Formatear los clientes usando ClienteResource
        // // $sociosFormateados = ClienteResource::collection($socios);
        // // Devolver los clientes formateados como una respuesta JSON
        // // return response()->json($sociosFormateados);
    }

    public function store(Request $request)
    {                
        
        //     return response()->json(['message' => 'Error al crear el cliente', ], 200);
        //     $request->validate([
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
            $socios = Asociado::create($request->all());
            if ($socios) {
                return response()->json(['message' => 'Cliente creado satisfactoriamente'], 201);
            }else{
                return response()->json(['message' => 'Error al ejecutar la creación del asociado'], 404);

            }
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

        $socios = Asociado::find($id);    

        if (!$socios) {
            $message = 'Cliente no encontrado';
            return response()->json([
                'message' => $message,
                'status' => 404
            ]);
        }    
        // Actualizar los datos del cliente
        $socios->update($request->all());    
        $message = 'Cliente actualizado satisfactoriamente';    
        return response()->json([
            'message' => $message,
            'status' => 200
        ]);

    }   
    
    public function destroy($id)
    {
        $socios = Asociado::findOrFail($id);
        // Aquí podrías agregar la validación de autorización si es necesario
        try {
            $socios->delete();
            return redirect()->route('clients.index')->with('success', 'Cliente eliminado correctamente.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Ha ocurrido un error al eliminar el cliente.');
        }
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
            Excel::import(new PartnersImport, $file);
            return response()->json(['message' => 'Archivo importado correctamente'], 200);
        } catch (\Exception $e) {
            // En caso de error, retornar un mensaje de error
            return response()->json(['message' => 'Error al importar el archivo', 'error' => $e->getMessage()], 500);
        }
    }
}


