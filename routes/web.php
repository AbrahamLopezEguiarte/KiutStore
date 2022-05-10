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

Route::get('/', 'App\Http\Controllers\LandingPageController@index');

Route::get('/shop', 'App\Http\Controllers\ShopController@index');

Route::get('/shop/{product}', 'App\Http\Controllers\ShopController@show')->name('shop.show');

Route::resource('productos', CrudController::class)->middleware(['auth:sanctum', 'admin']);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard')->middleware(['auth:sanctum', 'admin']);
