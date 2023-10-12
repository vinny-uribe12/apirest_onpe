<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OnpeController;

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

Route::controller(OnpeController::class)->group(function(){
    Route::get('/', 'index');
    Route::get('participacion/{estado?}/{departamento?}/{provincia?}', 'participacion' )->name('participacion');
    
    Route::get('actas_ubigeo', 'actas_ubigeo')->name('actas_ubigeo');
    Route::get('actas_numero', 'actas_numero')->name('actas_numero');
});
