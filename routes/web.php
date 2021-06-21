<?php

use App\Http\Controllers\HabilidadesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonajeController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});
/*
Route::get('/Personaje', function () {
    return view('Personaje.index');
});
Route::get('/Personaje/create',[PersonajeController::class,'create']);
*/

Route::resource('Personaje', PersonajeController::class)->middleware('auth');
Route::resource('Habilidades', HabilidadesController::class)->middleware('auth');
Auth::routes();

Route::get('/home', [PersonajeController::class, 'index'])->name('home');

Route::group(['middleware'=>'auth'], function (){

    Route::get('/', [PersonajeController::class, 'index'])->name('home');
});
