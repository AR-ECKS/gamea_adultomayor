<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Coordinacion_caso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\AdultoMayor;
use App\Models\RegistroAtencion;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\App;

class Coordinacion_casoController extends Controller
{
    public function getRegistroAtencionJson($adultomayor_id)
    {
        
        // Obtener el registro más reciente para el adultomayor_id dado
        $registroAtencion = RegistroAtencion::where('adultomayor_id', $adultomayor_id)
            ->orderBy('fecha', 'desc')
            ->first();

        if ($registroAtencion) {
            return response()->json($registroAtencion);
        } else {
            return response()->json(['error' => 'Registro no encontrado'], 404);
        }
    }


    public function index(Request $request)
    {
         $coordinacion_caso= Coordinacion_caso::get();
         $adultomayor = AdultoMayor::get();
        return view('admin.coordinacion_caso.index', compact('coordinacion_caso','adultomayor'))->with('correcto', 'correcto');;
    }

    public function create()
    {
        $registros = RegistroAtencion::all();
    
        return view('admin.coordinacion_caso.create', compact('registros'));
    }
    
    

    public function store(Request $request)
    {
        
        $requestData = $request->all();
        
        Coordinacion_caso::create($requestData);

        return redirect('admin/coordinacion_caso')->with('flash_message', 'Coordinacion_caso added!');
    }


    public function show($id)
    {
        $coordinacion_caso = Coordinacion_caso::findOrFail($id);

        return view('admin.coordinacion_caso.show', compact('coordinacion_caso'));
    }

    public function edit($id)
    {
        $coordinacion_caso = Coordinacion_caso::findOrFail($id);
        $registros = RegistroAtencion::all();
    
        return view('admin.coordinacion_caso.edit', compact('coordinacion_caso', 'registros'));
    }
    
    

    public function update(Request $request, $id)
    {
        
        $requestData = $request->all();
        
        $coordinacion_caso = Coordinacion_caso::findOrFail($id);
        $coordinacion_caso->update($requestData);

        return redirect('admin/coordinacion_caso')->with('correcto', 'correcto');;
    }

    public function destroy($id)
    {
        Coordinacion_caso::where('id', $id)->update(['estado' => '0']);
        return redirect('admin/coordinacion_caso')->with('correcto', 'correcto');;
    }

      public function reingresar($id)
    {

        Coordinacion_caso::where('id', $id)->update(['estado' => '1']);

        return redirect('admin/coordinacion_caso')->with('correcto', 'correcto');
    }

    
    public function generateForm($id)
<<<<<<< HEAD
{
    date_default_timezone_set('America/La_Paz');
    $fecha_actual = date('Y-m-d');
    
    // Encuentra la coordinación de caso por su ID
    $coordinacion = Coordinacion_caso::findOrFail($id);
    
    // Encuentra el registro de atención asociado a la coordinación
    $registro = RegistroAtencion::findOrFail($coordinacion->registroatencion_id);
    
    // Encuentra al adulto mayor asociado al registro de atención
    $adulto = AdultoMayor::findOrFail($registro->adultomayor_id);

    // Genera la vista y la renderiza

        $view = View::make('admin/pdf/coordinacion', compact('adulto','coordinacion', 'registro'))->render();
=======
    {

        date_default_timezone_set('America/La_Paz');
        $fecha_actual = date('Y-m-d');
        $coordinacion = Coordinacion_caso::findOrFail($id);
        $registro = RegistroAtencion::findOrFail($id); // Encuentra el registro de atención por su ID

        $adulto = AdultoMayor::findOrFail($registro->adultomayor_id); // Encuentra al adulto mayor utilizando el ID almacenado en el registro de atención


        $view = View::make('admin/pdf/coordinacion', compact('adulto', 'registro'))->render();
>>>>>>> 3609d3d (trabajando en los pdfs)

        $pdf = App::make('dompdf.wrapper');
        $pdf->setOptions([
            'isPhpEnabled' => true,
            'isHtml5ParserEnabled' => true,
            'isRemoteEnabled' => true,

        ]);
        $pdf->getDomPDF()->setHttpContext(
            stream_context_create([
                'ssl' => [
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true,
                ]
            ])
        );
        $pdf->getDomPDF()->set_option('enable_html5_parser', true);
        $pdf->setPaper('A4');
        $pdf->loadHTML($view);
        return $pdf->stream('Registro_Atencion_' . $fecha_actual . '_.pdf',); // descarga
    }
}
