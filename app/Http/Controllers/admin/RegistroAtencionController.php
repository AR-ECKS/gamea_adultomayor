<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\RegistroAtencion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\AdultoMayor;
use App\Models\Hijoadultomayor;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\App;

class RegistroAtencionController extends Controller
{

    public function index(Request $request)
    {
        // Obtener el año actual
        $anio_actual = Carbon::now()->year;

        // Obtener el último número de caso registrado para el año actual
        $ultimo_nro_caso = RegistroAtencion::whereYear('created_at', $anio_actual)
            ->max('nro_caso');

        // Si no hay ningún número de caso registrado para el año actual, establecerlo como 1
        if (is_null($ultimo_nro_caso)) {
            $nro_caso = '1/' . $anio_actual;
        } else {
            // Si ya hay números de caso registrados, incrementar el último número de caso
            $nro_caso = ++$ultimo_nro_caso . '/' . $anio_actual;
        }

        // Obtener todos los registros de atención
        $registroatencion = RegistroAtencion::get();
        $adultomayor = AdultoMayor::get();
        // Pasar el número de caso al formulario
        return view('admin.registro-atencion.index', compact('registroatencion', 'nro_caso', 'adultomayor'))->with('correcto', 'correcto');
    }

    public function create()
    {
        // Obtener el año actual
        $anio_actual = Carbon::now()->year;

        // Obtener el último número de caso registrado para el año actual
        $ultimo_nro_caso = RegistroAtencion::whereYear('created_at', $anio_actual)
            ->max('nro_caso');

        // Si no hay ningún número de caso registrado para el año actual, establecerlo como 1
        if (is_null($ultimo_nro_caso)) {
            $nro_caso = '1/' . $anio_actual;
        } else {
            // Separar el número de caso y el año
            list($ultimo_numero, $anio_registrado) = explode('/', $ultimo_nro_caso);

            // Incrementar el número de caso
            $ultimo_numero++;

            // Formar el nuevo número de caso
            $nro_caso = $ultimo_numero . '/' . $anio_actual;
        }

        // Obtener todos los registros de atención
        $registroatencion = RegistroAtencion::get();
        $adultomayor = AdultoMayor::get();
        // Pasar el número de caso al formulario
        return view('admin.registro-atencion.create', compact('registroatencion', 'nro_caso', 'adultomayor'))->with('correcto', 'correcto');
    }


    public function store(Request $request)
    {

        $requestData = $request->all();

        RegistroAtencion::create($requestData);

        return redirect('admin/registroatencion')->with('flash_message', 'RegistroAtencion added!');
    }


    public function show($id)
    {
        $registroatencion = RegistroAtencion::findOrFail($id);

        return view('admin.registro-atencion.show', compact('registroatencion'));
    }

    public function edit($id)
    {
        $registroatencion = RegistroAtencion::findOrFail($id);
        // Obtener el año actual
        $anio_actual = Carbon::now()->year;

        // Obtener el último número de caso registrado para el año actual
        $ultimo_nro_caso = RegistroAtencion::whereYear('created_at', $anio_actual)
            ->max('nro_caso');

        // Si no hay ningún número de caso registrado para el año actual, establecerlo como 1
        if (is_null($ultimo_nro_caso)) {
            $nro_caso = '1/' . $anio_actual;
        } else {
            // Separar el número de caso y el año
            list($ultimo_numero, $anio_registrado) = explode('/', $ultimo_nro_caso);

            // Incrementar el número de caso
            $ultimo_numero++;

            // Formar el nuevo número de caso
            $nro_caso = $ultimo_numero . '/' . $anio_actual;
        }

        // Obtener todos los registros de atención

        $adultomayor = AdultoMayor::get();
        // Pasar el número de caso al formulario
        return view('admin.registro-atencion.edit', compact('registroatencion', 'nro_caso', 'adultomayor'))->with('correcto', 'correcto');
    }


    public function update(Request $request, $id)
    {

        $requestData = $request->all();

        $registroatencion = RegistroAtencion::findOrFail($id);
        $registroatencion->update($requestData);

        return redirect('admin/registroatencion')->with('correcto', 'correcto');;
    }

    public function destroy($id)
    {

        RegistroAtencion::where('id', $id)->update(['estado' => '0']);
        return redirect('admin/registroatencion')->with('correcto', 'correcto');;
    }

    public function reingresar($id)
    {

        RegistroAtencion::where('id', $id)->update(['estado' => '1']);

        return redirect('admin/registroatencion')->with('correcto', 'correcto');
    }

    public function generateForm($id)
    {

        date_default_timezone_set('America/La_Paz');
        $fecha_actual = date('Y-m-d');
        $registro = RegistroAtencion::findOrFail($id); // Encuentra el registro de atención por su ID

        $adulto = AdultoMayor::findOrFail($registro->adultomayor_id); // Encuentra al adulto mayor utilizando el ID almacenado en el registro de atención

        $hijos = Hijoadultomayor::where('adultomayor_id', $registro->adultomayor_id)->get(); // Encuentra todos los hijos del adulto mayor asociado al registro de atención

        $view = View::make('admin/pdf/registroatencion', compact('adulto', 'hijos', 'registro'))->render();

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
