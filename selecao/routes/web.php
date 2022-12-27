<?php

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

use App\Http\Controllers\Formula;
use App\Http\Controllers\CRUD;

Route::get('/formulario', [Formula::class,'formular']);
Route::post('/animals', [Formula::class,'store']);
Route::get('/formulario/{id}', [Formula::class,'edit']);
Route::put('/formulario/update/{id}', [Formula::class,'update']);

Route::get('/', [CRUD::class,'comandos']);
Route::delete('/animals/{id}', [CRUD::class,'destroy']);
