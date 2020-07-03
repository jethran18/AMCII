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
    return view('inicio');
});

Route::post('/registrar', 'UsuarioController@crearUsuario')->name('usuario.crearUsuario');
Route::post('/login', 'UsuarioController@UsuarioLogin')->name('usuario.login');
Route::put('/editarPerfil/{id}', 'UsuarioController@updateUsuario')->name('usuario.updateUsuario');


Route::resource('tablero', 'TableroController');
Route::resource('actividad', 'ActividadController');

Route::get('/principal/usuario/{id}', 'UsuarioController@index')->name('principal.usuario');
Route::get('/usuario/perfil/{id}', 'UsuarioController@getUsuario')->name('usuario.getUsuario');

Route::get('/actividades/usuario/{id}', 'ActividadController@getActividadesUsuario')->name('actividad.getActividadesUser');
//Admin
Route::get('/admin', function () {
    return view('admin_Menu');
})->name('admin.menu');

Route::get('/admin/users', 'UsuarioController@getUsuarios')->name('admin.usuarios');

Route::get('/admin/activities','ActividadController@getActividadesAll')->name('admin.actividades');

Route::put('/actividades/listas/{id}', 'ActividadController@updateActividadesRealizadas');
