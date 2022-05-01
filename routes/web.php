<?php

use App\Http\Livewire\EstanteriaController;
use Illuminate\Support\Facades\Route;

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
    return view('inicio');
});



Route::view('/estanteria', 'estanteria')->name('estanteria');

Route::view('tamano', 'tamano')->name('tamano');
Route::view('etapa', 'etapa')->name('etapa');

Route::view('injertacion', 'injertacion')->name('injertacion');

Route::view('patronaje', 'patronaje')->name('patronaje');
Route::view('producto', 'producto')->name('producto');
Route::view('cliente', 'cliente')->name('cliente');
Route::view('pedido', 'pedido')->name('pedido');

Route::view('detalle-pedido', 'detalle-pedido')->name('detalle-pedido');

