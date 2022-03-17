<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CrudController;

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
    return view('welcome');
});

Route::controller(CrudController::class)->group(function(){
    Route::get('productos-totales', 'index')->name('productos.index');
    Route::get('agregar-producto', 'create')->name('productos.create');
    Route::get('mostrar-producto/{producto}', 'show')->name('productos.show');
    Route::post('productos-formulario', 'store')->name('producto.store');
});