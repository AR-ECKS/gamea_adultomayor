<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CasoExtravio;

class InicioController extends Controller
{
    public function index(Request $request){
        $casos_de_estravio = CasoExtravio::where('estado', '=', '1')->limit(10)->get();
        return view('welcome', compact('casos_de_estravio'));
    }
}
