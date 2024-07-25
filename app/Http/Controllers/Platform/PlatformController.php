<?php

namespace App\Http\Controllers\Platform;

use App\Http\Controllers\Controller;
use App\Http\Resources\PlatformResource; // Import PersonResource

use Illuminate\Http\Request;

use Inertia\Inertia;
use App\Models\Platform;
//

use Maatwebsite\Excel\Facades\Excel;
use App\Imports\PlatformsImport; 

class PlatformController extends Controller
{
    public function index()
        {
            // Obtener las plataformas (suponiendo que esto ya está funcionando correctamente)
            $plataformas = Platform::all();
        
            // Formatear las plataformas utilizando PlatformResource
            $plataformasFormateadas = PlatformResource::collection($plataformas);
             // Retornar un array JSON con un mensaje y las plataformas formateadas
                
             return response()->json([
                    'message' => 'Plataformas obtenidas correctamente',
                    'plataformas' => $plataformasFormateadas,
                ]);     
        
            // Agregar el array adicional al arreglo de datos que se pasará a la plantilla Inertia
            // return Inertia::render('Admin/Platforms/Index', [
            //     'plataformas' => $plataformasFormateadas,
            // ]);
        }
    
    public function store(Request $request)
        {
            // Validar los datos de la solicitud

            $validatedData = $request->validate([
                'plataforma' => 'string',
                'codigo_sede' => 'string',
                'codigo_plataforma' => 'string',
            ]);
        
            try {

                // Intentar crear la plataforma
                $plataforma = Platform::create($validatedData);
        
                // Comprobar si se creó correctamente
                if ($plataforma) {
                    // Retornar respuesta JSON en caso de éxito
                    return response()->json(['message' => 'Plataforma creada satisfactoriamente', 'status' => 200]);
                } else {
                    // Retornar una respuesta de error si no se pudo crear
                    return response()->json(['message' => 'Error al crear la plataforma', 'status' => 500]);
                }
            } catch (\Exception $e) {
                // Capturar cualquier excepción que pueda ocurrir durante la creación
                return response()->json(['message' => 'Error interno del servidor', 'status' => 500]);
            }
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
            $plataforma = Platform::find($id);

            if (!$plataforma) {
                $message = 'Cliente no encontrado';
                return response()->json([
                    'message' => $message,
                    'status' => 404
                ]);
            }

            // Actualizar los datos del cliente
            $plataforma->update($request->all());

            $message = 'Cliente actualizado satisfactoriamente';

            return response()->json([
                'message' => $message,
                'status' => 200
            ]);

        }   

    public function destroy($id)
        {
            $cliente = Platform::findOrFail($id);
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

            $plataformas = Platform::whereDate('created_at', $fecha)->get();

            return response()->json([
                'clientes' => PlatformResource::collection($plataformas)
            ]);
        }

    public function filterByDateRange(Request $request)
        {
            $fechaInicio = $request->input('fecha_inicio');
            $fechaFin = $request->input('fecha_fin');

            $plataformas = Platform::whereDate('created_at', '>=', $fechaInicio)
                                ->whereDate('created_at', '<=', $fechaFin)
                                ->get();

            return response()->json([
                'clientes' => PlatformResource::collection($plataformas)
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
                Excel::import(new PlatformsImport, $file);
                return response()->json(['message' => 'Archivo importado correctamente'], 200);
            } catch (\Exception $e) {
                // En caso de error, retornar un mensaje de error
                return response()->json(['message' => 'Error al importar el archivo', 'error' => $e->getMessage()], 500);
            }
        }
     

}
