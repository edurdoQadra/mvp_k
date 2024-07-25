<?php

namespace App\Http\Controllers\Person;

use App\Http\Controllers\Controller;
use App\Http\Resources\StoreResource; // Import PersonResource
use App\Http\Resources\ClienteResource; // Importar el recurso ClienteResource
use App\Http\Resources\PersonResource;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Local;
use App\Models\Cliente;
use Illuminate\Http\JsonResponse;
use App\Models\Person;
//
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\PersonsImport; 

class PersonController extends Controller
{

        public function index()
        {
            // return Inertia::render('Admin/Stores/Index', [
            //     'personas' => PersonResource::collection(Person::all()),
            // ]);          
            //Obtener todos los clientes
            $personas = Person::all();        
            //Formatear los clientes usando ClienteResource
            $personasFormateados = PersonResource::collection($personas);
            // Devolver los clientes formateados como una respuesta JSON
            return response()->json($personasFormateados);
        }

        public function store(Request $request)
        {
        //$data=$request;
        //  $request->validate([           
        //      'fecha' => 'date',
        //      'dni' => 'string',
        //      'medio_de_contacto' => 'string',
        //      'medio_de_respuesta' => 'string',
        //      'como_llego_a_la_marca' => 'string',
        //      'tipo_negocio' => 'string',
        //      'estado' => 'string',
        //      'respuesta_asesor' => 'string',
        //      'primer_contacto' => 'string',
        //      'segundo_contacto' => 'string',
        //      'tercer_contacto' => 'string',
        //      'contacto' => 'string',
        //      'realizo_la_venta' => 'string',
        //      'futuro_socio' => 'string',
        //  ]);

        //dd($data); 
        // Crear el cliente si pasa todas las validaciones
        $personas = Person::create($request->all());

            $mensaje = "Este es un mensaje de texto simple desde un controlador de Laravel.";
            return response($mensaje, 200)
                ->header('Content-Type', 'text/plain');          

        if ($personas) {
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

        // return redirect()->route('clients.index');
        }

        public function update(Request $request, $id)
        {
        //  $request->validate([           
        //      'fecha' => 'date',
        //      'dni' => 'string',
        //      'medio_de_contacto' => 'string',
        //      'medio_de_respuesta' => 'string',
        //      'como_llego_a_la_marca' => 'string',
        //      'tipo_negocio' => 'string',
        //      'producto_o_servicio' => 'string',
        //      'estado' => 'string',
        //      'respuesta_asesor' => 'string',
        //      'primer_contacto' => 'string',
        //      'segundo_contacto' => 'string',
        //      'tercer_contacto' => 'string',
        //      'contacto' => 'string',
        //      'realizo_la_venta' => 'string',
        //      'futuro_socio' => 'string',
        //  ]);
        //  dd($request->all());

        // Obtener el cliente por su ID
        $person = Person::find($id);

        if (!$person) {
            $message = 'Cliente no encontrado';
            return response()->json([
                'message' => $message,
                'status' => 404
            ]);
        }

        // Actualizar los datos del cliente
        $person->update($request->all());

        $message = 'Cliente actualizado satisfactoriamente';

        return response()->json([
            'message' => $message,
            'status' => 200
        ]);
        }   

        public function destroy($id)
        {
        $cliente = Person::findOrFail($id);
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
    
            $Personas = Person::whereDate('created_at', $fecha)->get();
    
            return response()->json([
                'clientes' => PersonResource::collection($Personas)
            ]);
        }
    
        public function filterByDateRange(Request $request)
        {
            $fechaInicio = $request->input('fecha_inicio');
            $fechaFin = $request->input('fecha_fin');
    
            $Personas = Person::whereDate('created_at', '>=', $fechaInicio)
                                ->whereDate('created_at', '<=', $fechaFin)
                                ->get();
    
            return response()->json([
                'clientes' => PersonResource::collection($Personas)
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
                Excel::import(new PersonsImport, $file);
                return response()->json(['message' => 'Archivo importado correctamente'], 200);
            } catch (\Exception $e) {
                // En caso de error, retornar un mensaje de error
                return response()->json(['message' => 'Error al importar el archivo', 'error' => $e->getMessage()], 500);
            }
        }
 
}
