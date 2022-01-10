<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\HomeController;
use App\Http\Livewire\EstanteriaController;

Route::get('/', [HomeController::class, 'index']);


//Route::get('/estanterias', EstanteriaController::class, 'index')->name('est.estanterias');


