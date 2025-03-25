<?php

namespace App\Http\Controllers;
//importar el modelo 
use App\Models\ProductoModelo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http; // Importar HTTP Client
use Illuminate\Support\Facades\Validator;
class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $Producto=ProductoModelo::all();
        if ($Producto->isEmpty()) {
            // Si está vacío, devolvemos una respuesta distinta según el contexto
            if (request()->ajax()) {
                return response()->json([
                    'message' => 'No hay productos disponibles',
                    'status' => 404
                ], 404); // Devuelve JSON con un mensaje de "No encontrado"
            }
        }
        if (request()->ajax()) {
            $data = [
                'students' => $Producto,
                'status' => 200
            ];
            return response()->json($data, 201);
        }
        
        
        return view('produc.lista_produc', compact('Producto'));
        //return response()->json($data, 201);
      
     
  
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validadicon 
      $validator=validator::make($request->all(),[
        'nombre_producto'=>'required',
        'descripcion'=>'required',
        'Cantidad'=>'required'
      ]);
      //fallo de validadcion
      if($validator->fails()){
        $data=[
           'message'=> 'error en la validadcion de datros',
           'errors' => $validator->errors(),
            'status' => 400
        
        ];
        return response()->json($data, 400);
      }
      //crear el producto
      $Producto =ProductoModelo::create([
        'nombre_producto' => $request->nombre_producto,
        'descripcion' => $request->descripcion,
        'Cantidad' => $request->Cantidad
      ]);
      //si existe un fallo en la creacion 
      if(!$Producto){
            $data=[
                'message' => 'Error al crear el Producto',
                'status' => 500
            ];
            return response()->json($data, 500);
      }
      /*
      //si todo esta bien
            $data = [
                'student' => $Producto,
                'status' => 201
            ];

            return response()->json($data, 201);
      //
      */
      if (request()->ajax()) {
        $data = [
            'students' => $Producto,
            'status' => 200
        ];
        return response()->json($data, 201);
    }
      return view('produc.lista_produc', compact('Producto'));
    }

    /**
     * Display the specified resource.
     */
    public function show(ProductoModelo $id)
    {
        //
        $Producto= ProductoModelo::find($id);
        if (!$Producto) {
            $data = [
                'message' => 'Producto no encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $data = [
            'student' => $Producto,
            'status' => 200
        ];

        return response()->json($data, 200);
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $Producto= ProductoModelo::find($id);
        if (!$Producto) {
            $data = [
                'message' => 'Producto no encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }
        if (request()->ajax()) {
            $data = [
                'students' => $Producto,
                'status' => 200
            ];
            return response()->json($data, 201);
        }
        
        
        return view('produc.editar_produc', compact('Producto'));
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $Producto = ProductoModelo::find($id);

        if (!$Producto) {
            $data = [
                'message' => 'Producto no encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $validator = Validator::make($request->all(), [
        'nombre_producto'=>'required',
        'descripcion'=>'required',
        'Cantidad'=>'required'
        ]);

        if ($validator->fails()) {
            $data = [
                'message' => 'Error en la validación de los datos',
                'errors' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
        }

        $Producto->nombre_producto = $request->nombre_producto;
        $Producto->descripcion = $request->descripcion;
        $Producto->Cantidad = $request->Cantidad;
     

        $Producto->save();

      /*  $data = [
            'message' => 'Producto actualizado',
            'student' => $Producto,
            'status' => 200
        ];

        return response()->json($data, 200);
*/
if (request()->ajax()) {
    $data = [
        'students' => $Producto,
        'status' => 200
    ];
    return response()->json($data, 201);
}

        //return view('produc.editar_produc', compact('Producto'));
        return view('produc.lista_produc', compact('Producto'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        $Producto = ProductoModelo::find($id);

        if (!$Producto) {
            $data = [
                'message' => 'Producto no encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }
        
        $Producto->delete();

        $data = [
            'message' => 'Producto eliminado',
            'status' => 200
        ];

        return response()->json($data, 200);
        //
    }
}
