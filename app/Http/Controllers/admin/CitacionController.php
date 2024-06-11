<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;

use App\Models\Citacion;
use App\Models\RegistroAtencion;
use Illuminate\Http\Request;

class CitacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $citaciones = Citacion::get();
        return view('admin.citacion.index', compact('citaciones'))->with('correcto', 'correcto');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $registros_atenciones = RegistroAtencion::get();
        return view('admin.citacion.create', compact('registros_atenciones'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        
        $requestData = $request->all();
        
        Citacion::create($requestData);

        return redirect('admin/citacion')->with('correcto', 'Citacion creada exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $citacion = Citacion::findOrFail($id);

        return view('admin.citacion.show', compact('citacion'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $citacion = Citacion::findOrFail($id);
        $registros_atenciones = RegistroAtencion::get();
        return view('admin.citacion.edit', compact('registros_atenciones', 'citacion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        
        $requestData = $request->all();
        
        $citacion = Citacion::findOrFail($id);
        $citacion->update($requestData);

        return redirect('admin/citacion')->with('correcto', 'La citación ha sido actualizada exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Citacion::where('id', $id)->update(['estado' => '0']);

        return redirect('admin/citacion')->with('correcto', 'La citación ha sido eliminado exitosamente');
    }

    public function reingresar($id)
    {

        Citacion::where('id', $id)->update(['estado' => '1']);

        return redirect('admin/citacion')->with('correcto', 'Citación restaurada exitosamente');
    }
}
