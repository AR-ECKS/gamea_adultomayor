<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CasoExtravio;
use App\Models\AdultoMayor;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CasoExtravioController extends Controller
{
    const OPTIONS_IMAGE = [
        'escale' => [1, 1],
        'min_width' => 300,
        'max_width' => 1000,
        'max_size' => 10240. //KB = 10MB //9551713,
    ];

    public function index(Request $request)
    {
        $casos_de_estravios = CasoExtravio::get();
        return view('admin.caso_extravio.index', compact('casos_de_estravios'))->with('correcto', 'correcto');;
    }

    public function create()
    {
        
        $adultos_mayores = AdultoMayor::get();
        return view('admin.caso_extravio.create', compact('adultos_mayores'))->with('correcto', 'correcto')
            ->with('OPTIONS_IMAGE', self::OPTIONS_IMAGE);;
    }

    public function store(Request $request)
    {
        $requestData = $request->all();

        /* $validate = Validator::make($request->all(), [
            'fecha' => 'required|date',
            'descripcion' => 'required',
            'otros' => 'nullable|string|min:2',
            'adultomayor_id' => 'required',
            'ruta_imagen' => 'nullable|image|mimes:jpg,png|max:10240',
        ]);        

        if($validate->fails()){
            return response()->json([
                'status' => 'failed',
                'message' => 'Error de Validacion',
                'data' => $validate->errors(),
            ]);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Caso de extravio creado existosamente',
            'data' => 'Creado exitosamente'
        ]); */

        $request->validate([
            'fecha' => 'required|date',
            'descripcion' => 'required',
            'otros' => 'nullable|string|min:2',
            'adultomayor_id' => 'required',
            'ruta_imagen' => 'nullable|image|mimes:jpg,png|max:10240',
        ]);
        
        $caso_extravio = new CasoExtravio();
        $caso_extravio->fecha = $request->fecha;
        $caso_extravio->descripcion = $request->descripcion;
        $caso_extravio->otros = $request->otros;
        $caso_extravio->adultomayor_id = $request->adultomayor_id;
        # procesar imagen
        if(!is_null($request->imagen)){
            $image = base64_decode($request->imagen);
            /* $nombreArchivo = $image->getClientOriginalName();
            $extensionarchivo = $image->getClientOriginalExtension(); */
            return response()->json([
                "code"=> "1",
                "message"=> "Ocurrio un error al subir la imagen",
                "data"=> $image
            ], 200);
        }
        $caso_extravio->save();
        #
        return redirect('admin/caso_extravio')->with('flash_message', 'RegistroAtencion added!');
    }

    public function show($id)
    {
        $caso_extravio = CasoExtravio::findOrFail($id);
        return view('admin.caso_extravio.show', compact('caso_extravio'));
    }
}
