<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Seguimiento_caso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\RegistroAtencion;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\App;
use App\Models\CasoExtravio;
use App\Models\AdultoMayor;
class Seguimiento_casoController extends Controller
{

    public function index(Request $request)
    {
        $seguimiento_caso= Seguimiento_caso::get();
        return view('admin.seguimiento_caso.index', compact('seguimiento_caso'))->with('correcto', 'correcto');;
    }

    public function create()

    {         
        $registros = RegistroAtencion::get();

 
        return view('admin.seguimiento_caso.create', compact('registros'));
    }

    public function store(Request $request)
    {
        
        $requestData = $request->all();

       
        
        Seguimiento_caso::create($requestData);

        return redirect('admin/seguimiento_caso')->with('flash_message', 'Seguimiento_caso added!');
    }


    public function show($id)
    {
        $seguimiento_caso = Seguimiento_caso::findOrFail($id);

        return view('admin.seguimiento_caso.show', compact('seguimiento_caso'));
    }

    public function edit($id)
    {
        $seguimiento_caso = Seguimiento_caso::findOrFail($id);
        $registros = RegistroAtencion::get();

        return view('admin.seguimiento_caso.edit', compact('seguimiento_caso', 'registros'));
    }


    public function update(Request $request, $id)
    {
        
        $requestData = $request->all();

        $request->validate([
            'fecha' => 'required',
            'tipologia' => 'required',
            'descripcion' => 'required',
            'nombre_completo' => 'required',
            'celular' => 'required',
            'registroatencion_id' => 'required'
        ]);
        
        $seguimiento_caso = Seguimiento_caso::findOrFail($id);
        $seguimiento_caso->update($requestData);

        return redirect('admin/seguimiento_caso')->with('correcto', 'correcto');;
    }

    public function destroy($id)
    {
        //Seguimiento_caso::destroy($id);
        Seguimiento_caso::where('id', $id)->update(['estado' => '0']);
        return redirect('admin/seguimiento_caso')->with('correcto', 'correcto');;
    }

      public function reingresar($id)
    {

        Seguimiento_caso::where('id', $id)->update(['estado' => '1']);

        return redirect('admin/seguimiento_caso')->with('correcto', 'correcto');;
    }
    
    public function generateForm($id)
{
    date_default_timezone_set('America/La_Paz');
    $fecha_actual = date('Y-m-d');
    
    // Encuentra la coordinación de caso por su ID
    $seguimiento_caso = Seguimiento_caso::findOrFail($id);
    
    // Encuentra el registro de atención asociado a la coordinación
    $registro = RegistroAtencion::findOrFail($seguimiento_caso->registroatencion_id);
    
    // Encuentra al adulto mayor asociado al registro de atención
    $adulto = AdultoMayor::findOrFail($registro->adultomayor_id);

    // Genera la vista y la renderiza

        $view = View::make('admin/pdf/seguimiento', compact('adulto','seguimiento_caso', 'registro'))->render();

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
