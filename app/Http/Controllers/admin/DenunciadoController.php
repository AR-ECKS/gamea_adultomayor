<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Denunciado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DenunciadoController extends Controller
{

    public function index(Request $request)
    {
         $denunciados= Denunciado::get();
        return view('admin.denunciados.index', compact('denunciados'))->with('correcto', 'correcto');;
    }


    public function store(Request $request)
    {
        
        $requestData = $request->all();
        
        Denunciado::create($requestData);

        return redirect('admin/denunciados')->with('flash_message', 'Denunciado added!');
    }


    public function show($id)
    {
        $denunciado = Denunciado::findOrFail($id);

        return view('admin.denunciados.show', compact('denunciado'));
    }

    public function edit($id)
    {
        $denunciado = Denunciado::findOrFail($id);

        return view('admin.denunciados.edit', compact('denunciado'));
    }


    public function update(Request $request, $id)
    {
        
        $requestData = $request->all();
        
        $denunciado = Denunciado::findOrFail($id);
        $denunciado->update($requestData);

        return redirect('admin/denunciados')->with('correcto', 'correcto');;
    }

    public function destroy($id)
    {
        Denunciado::destroy($id);
        Denunciado::where('id', $id)->update(['estado' => '0']);
        return redirect('admin/denunciados')->with('correcto', 'correcto');;
    }

      public function reingresar($id)
    {

        Denunciado::where('id', $id)->update(['estado' => '1']);

        return redirect('admin/denunciados')->with('correcto', 'correcto');
    }
}
