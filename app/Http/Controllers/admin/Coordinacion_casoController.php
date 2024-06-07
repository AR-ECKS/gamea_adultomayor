<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Coordinacion_caso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\AdultoMayor;
use App\Models\RegistroAtencion;

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
        $adultomayor = AdultoMayor::get();
        return view('admin.coordinacion_caso.create', compact('adultomayor'));
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

        return view('admin.coordinacion_caso.edit', compact('coordinacion_caso'));
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
        Coordinacion_caso::destroy($id);
        Coordinacion_caso::where('id', $id)->update(['estado' => '0']);
        return redirect('admin/coordinacion_caso')->with('correcto', 'correcto');;
    }

      public function reingresar($id)
    {

        Coordinacion_caso::where('id', $id)->update(['estado' => '1']);

        return redirect('admin/coordinacion_caso')->with('correcto', 'correcto');
    }
}
