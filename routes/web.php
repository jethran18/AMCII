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

Route::post('/principal', 'UsuarioController@index')->name('usuario.index');
/*Route::get('/admin_Menu', function () {
    return view('admin_Menu');
});*/
Route::post('/', 'UsuarioController@crearUsuario')->name('usuario.crearUsuario');

Route::post('/', 'UsuarioController@UsuarioLogin')->name('usuario.login');