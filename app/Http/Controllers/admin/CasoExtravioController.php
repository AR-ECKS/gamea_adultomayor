<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CasoExtravio;
use App\Models\AdultoMayor;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class CasoExtravioController extends Controller
{
    const OPTIONS_IMAGE = [
        'escale' => [1, 1], // ancho alto
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
            try {
                $imagen = Image::make($request->imagen);
                $ancho_final = 0;
                $alto_final = 0;
                if(self::OPTIONS_IMAGE['min_width'] >= $imagen->width() && $imagen->width() <= self::OPTIONS_IMAGE['max_width']){
                    $ancho_final = $imagen->width();
                    $alto_final = ($ancho_final/ self::OPTIONS_IMAGE['escale'][0]) * self::OPTIONS_IMAGE['escale'][1];
                } else {
                    $ancho_final = $imagen->width() > self::OPTIONS_IMAGE['max_width']? self::OPTIONS_IMAGE['max_width']: self::OPTIONS_IMAGE['min_width'];
                    $alto_final = ($ancho_final/self::OPTIONS_IMAGE['escale'][0]) * self::OPTIONS_IMAGE['escale'][1];
                }
                $imagen->resize($ancho_final, $alto_final);
                $nombre_foto = "Adulto_Mayor_Foto_". \Carbon\Carbon::now()->timestamp . '.jpg';
                //$imagen->save(public_path('extravios/'). $nombre_foto, 100, 'jpg');
                $imagen->save(Storage::disk('extravios')->path('/'). $nombre_foto, 100, 'jpg');
                #$imagen->save(Storage::disk('recursos_empresa')->path('/'). $nombre_foto);
                
                $caso_extravio->ruta_imagen = $nombre_foto;
            }catch(\Exception $e){
                # error, no se como se lanza errores
                //throw $e;
            }
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
