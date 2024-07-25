<?php

namespace App\Http\Controllers\Transaction;

use App\Http\Controllers\Controller;
use App\Http\Resources\TransactionResource; // Import PersonResource
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Transaction;

use Maatwebsite\Excel\Facades\Excel;
use App\Imports\TransactionsImport; 

class TransactionController extends Controller
{
    public function index()
    {
        return Inertia::render('Admin/Transactions/Index', [
            'transacciones' => TransactionResource::collection(Transaction::all())
        ]);  
        
       //Obtener todos los clientes
        $transacciones = Transaction::all();        
        //Formatear los clientes usando ClienteResource
        $transaccionesFormateados = TransactionResource::collection($transacciones);
       // Devolver los clientes formateados como una respuesta JSON
        return response()->json($transaccionesFormateados);

     }

       
    public function store(Request $request)
    {
        // $request->validate([           
        //     
        // ]);

    //    dd($request->all()); 
    // Crear el cliente si pasa todas las validaciones
       $transacciones = Transaction::create($request->all());

    $mensaje = "Este es un mensaje de texto simple desde un controlador de Laravel.";
    return response($mensaje, 200)
        ->header('Content-Type', 'text/plain');          

      if ($transacciones) {
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
        $transacciones = Transaction::find($id);
    
        if (!$transacciones) {
            $message = 'Cliente no encontrado';
            return response()->json([
                'message' => $message,
                'status' => 404
            ]);
        }
    
        // Actualizar los datos del cliente
        $transacciones->update($request->all());
    
        $message = 'Cliente actualizado satisfactoriamente';
    
        return response()->json([
            'message' => $message,
            'status' => 200
        ]);
    }   
    
    public function destroy($id)
    {
        $transacciones = Transaction::findOrFail($id);
        // Aquí podrías agregar la validación de autorización si es necesario
        try {
            $transacciones->delete();
            return redirect()->route('clients.index')->with('success', 'Cliente eliminado correctamente.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Ha ocurrido un error al eliminar el cliente.');
        }
    }
      
    public function filterByDate(Request $request)
    {
        $fecha = $request->input('fecha');

        $stores = Transaction::whereDate('created_at', $fecha)->get();

        return response()->json([
            'clientes' => TransactionResource::collection($stores)
        ]);
    }

    public function filterByDateRange(Request $request)
    {
        $fechaInicio = $request->input('fecha_inicio');
        $fechaFin = $request->input('fecha_fin');

        $stores = Transaction::whereDate('created_at', '>=', $fechaInicio)
                            ->whereDate('created_at', '<=', $fechaFin)
                            ->get();

        return response()->json([
            'clientes' => TransactionResource::collection($stores)
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
            Excel::import(new TransactionsImport, $file);
            return response()->json(['message' => 'Archivo importado correctamente'], 200);
        } catch (\Exception $e) {
            // En caso de error, retornar un mensaje de error
            return response()->json(['message' => 'Error al importar el archivo', 'error' => $e->getMessage()], 500);
        }
    }
 

}
