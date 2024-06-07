<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\AdultoMayor;
use App\Models\Hijoadultomayor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdultoMayorController extends Controller
{

    public function index(Request $request)
    {
        $adultomayor = AdultoMayor::get();
        return view('admin.adulto-mayor.index', compact('adultomayor'))->with('correcto', 'correcto');;
    }


    public function store(Request $request)
    {
        // Validación de los datos del adulto mayor
        $validatedData = $request->validate([
            // Aquí va la validación para los campos del adulto mayor
        ]);


        // Creación del adulto mayor
        $adultoMayor = new AdultoMayor();
        $adultoMayor->nombres = $request->input('nombres');
        $adultoMayor->apellido_paterno = $request->input('apellido_paterno');
        $adultoMayor->apellido_materno = $request->input('apellido_materno');
        $adultoMayor->genero = $request->input('genero');
        $adultoMayor->ci = $request->input('ci');
        $adultoMayor->extension = $request->input('extension');
        $adultoMayor->fecha_nacimiento = $request->input('fecha_nacimiento');
        $adultoMayor->nro_referencia = $request->input('nro_referencia');
        $adultoMayor->situacion = $request->input('situacion');
        $adultoMayor->estado_civil = $request->input('estado_civil');
        $adultoMayor->grado_instruccion = $request->input('grado_instruccion');
        $adultoMayor->ocupacion = $request->input('ocupacion');
        $adultoMayor->domicilio = $request->input('domicilio');
        $adultoMayor->distrito = $request->input('distrito');
        $adultoMayor->zona = $request->input('zona');
        $adultoMayor->calle = $request->input('calle');
        $adultoMayor->nro = $request->input('nro');
        $adultoMayor->area = $request->input('area');
        $adultoMayor->otro_municipio = $request->input('otro_municipio');
        // Asignación de otros campos del adulto mayor
        $adultoMayor->cantidad_hijos = $request->input('cantidad_hijos');
        // Guardar el adulto mayor en la base de datos
        $adultoMayor->save();

        // Guardar los datos de los hijos
        $cantidadHijos = $request->input('cantidad_hijos');
        $hijosGuardados = 0; // Contador para llevar un registro de los hijos guardados

        for ($i = 0; $i < $cantidadHijos; $i++) {
            $nombreCompletoHijo = $request->input('nombre_completo.' . $i);
            $parentescoHijo = $request->input('parentesco.' . $i);
            $telefonoHijo = $request->input('numero_telefono.' . $i);

            // Verificar si el nombre del hijo no está vacío o nulo
            if ($nombreCompletoHijo !== null && $nombreCompletoHijo !== '') {
                // Creación del hijo
                $hijo = new Hijoadultomayor();
                $hijo->nombre_completo = $nombreCompletoHijo;
                $hijo->parentesco = $parentescoHijo;
                $hijo->telefono = $telefonoHijo;
                $hijo->adultomayor_id = $adultoMayor->id; // Asociación con el adulto mayor

                // Guardar el hijo en la base de datos
                $hijo->save();
                $hijosGuardados++;
            }
        }


        if ($hijosGuardados > 0) {
            return redirect('admin/adultomayor')->with('flash_message', 'AdultoMayor added!');
        } else {
            // Si no se guardó ningún hijo, puedes redirigir de nuevo al formulario con un mensaje de error
            return redirect()->back()->withErrors(['error' => 'No se ha guardado ningún hijo. Por favor, asegúrese de ingresar al menos un nombre para un hijo.']);
        }
    }


    public function show($id)
    {
        $adultomayor = AdultoMayor::findOrFail($id);
        $hijos = Hijoadultomayor::where('adultomayor_id',$id)->get();
        return view('admin.adulto-mayor.show', compact('adultomayor','hijos'));
    }

    public function edit($id)
    {
        $adultomayor = AdultoMayor::findOrFail($id);

        return view('admin.adulto-mayor.edit', compact('adultomayor'));
    }


    public function update(Request $request, $id)
    {

        $requestData = $request->all();

        $adultomayor = AdultoMayor::findOrFail($id);
        $adultomayor->update($requestData);

        return redirect('admin/adultomayor')->with('correcto', 'correcto');;
    }

    public function destroy($id)
    {

        AdultoMayor::where('id', $id)->update(['estado' => '0']);
        return redirect('admin/adultomayor')->with('correcto', 'correcto');;
    }

    public function reingresar($id)
    {

        AdultoMayor::where('id', $id)->update(['estado' => '1']);

        return redirect('admin/adultomayor')->with('correcto', 'correcto');
    }
}
