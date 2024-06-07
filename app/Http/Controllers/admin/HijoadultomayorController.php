<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Hijoadultomayor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HijoadultomayorController extends Controller
{

    public function index(Request $request)
    {
         $hijoadultomayor= Hijoadultomayor::get();
        return view('admin.hijoadultomayor.index', compact('hijoadultomayor'))->with('correcto', 'correcto');;
    }


    public function store(Request $request)
    {
        
        $requestData = $request->all();
        
        Hijoadultomayor::create($requestData);

        return redirect('admin/hijoadultomayor')->with('flash_message', 'Hijoadultomayor added!');
    }


    public function show($id)
    {
        $hijoadultomayor = Hijoadultomayor::findOrFail($id);

        return view('admin.hijoadultomayor.show', compact('hijoadultomayor'));
    }

    public function edit($id)
    {
        $hijoadultomayor = Hijoadultomayor::findOrFail($id);

        return view('admin.hijoadultomayor.edit', compact('hijoadultomayor'));
    }


    public function update(Request $request, $id)
    {
        
        $requestData = $request->all();
        
        $hijoadultomayor = Hijoadultomayor::findOrFail($id);
        $hijoadultomayor->update($requestData);

        return redirect('admin/hijoadultomayor')->with('correcto', 'correcto');;
    }

    public function destroy($id)
    {
        Hijoadultomayor::destroy($id);
        Hijoadultomayor::where('id', $id)->update(['estado' => '0']);
        return redirect('admin/hijoadultomayor')->with('correcto', 'correcto');;
    }

      public function reingresar($id)
    {

        Hijoadultomayor::where('id', $id)->update(['estado' => '1']);

        return redirect('admin/hijoadultomayor')->with('correcto', 'correcto');
    }
}
