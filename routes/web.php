<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CrudController;
use App\Http\Controllers\LandingPageController;

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
    return view('landing-page');
});

Route::post('productos/restore', [CrudController::class, 'restore'])->name('productos.restore');

Route::resource('productos', CrudController::class)->middleware(['auth:sanctum', 'admin']);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard')->middleware(['auth:sanctum', 'admin']);

//Cambiar la ruta get "/" por la ruta deseada en el futuro
Route::get('/', function () {
    return view('landing-page');
})->middleware(['auth', 'verified'])->name('landing-page');