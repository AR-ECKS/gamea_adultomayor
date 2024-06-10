<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InicioController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/* Route::get('/', function () {
	return view('welcome');
}); */
Route::get('/', [InicioController::class, 'index'])->middleware('guest');;

use App\Http\Controllers\admin\RoleController;
use App\Http\Controllers\admin\AdultoMayorController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\admin\RegistroAtencionController;
use App\Http\Controllers\admin\Seguimiento_casoController;
use App\Http\Controllers\admin\CasoExtravioController;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\admin\Coordinacion_casoController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;


/* Route::get('/', function () {
	return view('welcome');
})->middleware('guest'); */
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');
Route::get('sign-up', [RegisterController::class, 'create'])->middleware('guest')->name('register');
Route::post('sign-up', [RegisterController::class, 'store'])->middleware('guest');
Route::get('sign-in', [SessionsController::class, 'create'])->middleware('guest')->name('login');
Route::post('sign-in', [SessionsController::class, 'store'])->middleware('guest');
Route::post('verify', [SessionsController::class, 'show'])->middleware('guest');
Route::post('reset-password', [SessionsController::class, 'update'])->middleware('guest')->name('password.update');
Route::get('verify', function () {
	return view('sessions.password.verify');
})->middleware('guest')->name('verify');
Route::get('/reset-password/{token}', function ($token) {
	return view('sessions.password.reset', ['token' => $token]);
})->middleware('guest')->name('password.reset');

Route::post('sign-out', [SessionsController::class, 'destroy'])->middleware('auth')->name('logout');
Route::get('profile', [ProfileController::class, 'create'])->middleware('auth')->name('profile');
Route::post('user-profile', [ProfileController::class, 'update'])->middleware('auth');
Route::group(['middleware' => 'auth'], function () {

	Route::post('admin/users', [UserController::class, 'store'])->name('users.store');
	Route::get('admin/users', [UserController::class, 'index'])->name('users.index');
	Route::put('admin/users/{user}', [UserController::class, 'update'])->name('users.update');
	Route::delete('admin/users/{user}', [UserController::class, 'destroy'])->name('users.delete');
	Route::get('admin/users/{user}/deleted', [UserController::class, 'reingresar'])->name('users.reingresar');
	Route::post('admin/roles', [RoleController::class, 'store'])->name('roles.store');
	Route::get('admin/roles', [RoleController::class, 'index'])->name('roles.index');
	Route::put('admin/roles/{role}', [RoleController::class, 'update'])->name('roles.update');
	Route::delete('admin/roles/{role}', [RoleController::class, 'destroy'])->name('roles.delete');
	Route::get('admin/roles/{role}/deleted', [RoleController::class, 'reingresar'])->name('roles.reingresar');

    Route::resource('admin/adultomayor', AdultoMayorController::class);
    Route::delete('admin/adultomayor/{adultomayor}', [AdultoMayorController::class, 'destroy'])->name('adultomayor.delete');
    Route::get('admin/adultomayor/{adultomayor}/deleted', [AdultoMayorController::class, 'reingresar'])->name('adultomayor.reingresar');


    Route::resource('admin/registroatencion', RegistroAtencionController::class);
    Route::delete('admin/registroatencion/{registroatencion}', [RegistroAtencionController::class, 'destroy'])->name('registroatencion.delete');
    Route::get('admin/registroatencion/{registroatencion}/deleted', [RegistroAtencionController::class, 'reingresar'])->name('registroatencion.reingresar');
    Route::get('admin/registroatencion/{registroatencion}/generateForm)', [RegistroAtencionController::class, 'generateForm'])->name('registroatencion.generateForm');

	Route::resource('admin/coordinacion_caso', Coordinacion_casoController::class);
    Route::delete('admin/coordinacion_caso/{coordinacion_caso}', [Coordinacion_casoController::class, 'destroy'])->name('coordinacion_caso.delete');
    Route::get('admin/coordinacion_caso/{coordinacion_caso}/deleted', [Coordinacion_casoController::class, 'reingresar'])->name('coordinacion_caso.reingresar');
    Route::get('admin/coordinacion_caso/{coordinacion_caso}/generateForm)', [Coordinacion_casoController::class, 'generateForm'])->name('coordinacion_caso.generateForm');

	Route::get('admin/coordinacion_caso/json/{adultomayor_id}', [Coordinacion_casoController::class, 'getRegistroAtencionJson'])->name('getRegistroAtencionJson');
	
	Route::resource('admin/seguimiento_caso', Seguimiento_casoController::class);
    Route::delete('admin/seguimiento_caso/{seguimiento_caso}', [Seguimiento_casoController::class, 'destroy'])->name('seguimiento_caso.delete');
    Route::get('admin/seguimiento_caso/{seguimiento_caso}/deleted', [Seguimiento_casoController::class, 'reingresar'])->name('seguimiento_caso.reingresar');
    Route::get('admin/seguimiento_caso/{seguimiento_caso}/generateForm)', [Seguimiento_casoController::class, 'generateForm'])->name('seguimiento_caso.generateForm');

	Route::get('admin/seguimiento_caso/json/{adultomayor_id}', [Seguimiento_casoController::class, 'getRegistroAtencionJson'])->name('getRegistroAtencionJson');

	# Casos de extravios
	Route::resource('admin/caso_extravio', CasoExtravioController::class);
	Route::delete('admin/caso_extravio/{caso_extravio}', [CasoExtravioController::class, 'destroy'])->name('caso_extravio.delete');
	Route::get('admin/caso_extravio/{caso_extravio}/deleted', [CasoExtravioController::class, 'reingresar'])->name('caso_extravio.reingresar');


});




