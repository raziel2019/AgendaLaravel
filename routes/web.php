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

Route::get('/', function () {
    return view('calendario');
})->middleware("auth");


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Usuarios
Route::get('/usuarios', 'App\Http\Controllers\UsuariosController@index')->name('usuarios');
Route::get('/usuarios/create', 'App\Http\Controllers\UsuariosController@create')->name('usuarios.create');
Route::post('/usuarios', 'App\Http\Controllers\UsuariosController@store')->name('usuarios.store');

Route::get('/usuarios/{id}/edit','App\Http\Controllers\UsuariosController@edit')->name('usuarios.edit');
Route::put('/usuarios/{id}','App\Http\Controllers\UsuariosController@update')->name('usuarios.update');
Route::delete('/usuarios/{id}','App\Http\Controllers\UsuariosController@destroy')->name('usuarios.destroy');

//Calendario
Route::get('/Calendario', 'App\Http\Controllers\CalendarioController@index')->name('calendario');
Route::post('/Calendario/mostrar', 'App\Http\Controllers\CalendarioController@show')->name('calendario.show');
Route::post('/Calendario/agregar', 'App\Http\Controllers\CalendarioController@store')->name('calendario.store');
Route::post('/Calendario/editar/{id}','App\Http\Controllers\CalendarioController@edit')->name('calendario.edit');
Route::post('/Calendario/borrar/{id}','App\Http\Controllers\CalendarioController@destroy')->name('calendario.destroy');
Route::post('/Calendario/actualizar/{evento}','App\Http\Controllers\CalendarioController@update')->name('calendario.update');

//Eventos
Route::get('/Eventos', 'App\Http\Controllers\EventosController@index')->name('Eventos');
Route::post('/Eventos/mostrar', 'App\Http\Controllers\EventosController@show')->name('Eventos.show');
Route::post('/Eventos/agregar', 'App\Http\Controllers\EventosController@store')->name('Eventos.store');
Route::put('/Eventos/{id}','App\Http\Controllers\EventosController@update')->name('Eventos.update');
Route::delete('/Eventos/borrar/{id}','App\Http\Controllers\EventosController@destroy')->name('Eventos.destroy');