<?php

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

use Illuminate\Support\Facades\Input;
use Dulceria\User;


Route::get('/','FrontController@index');

Route::resource('admin','AdminController');

Route::resource('categorias','CategoriaController');

Route::resource('articulos','ArticuloController');

Route::resource('clientes','ClienteController');

Route::resource('proveedores','ProveedorController');

Route::resource('ingreso','IngresoController');

Route::resource('venta','VentaController');


Route::get('categorias/{id}/destroy', [
  'uses' => 'CategoriaController@destroy',
  'as' => 'categorias.destroy'
]);

Route::get('articulos/{id}/destroy', [
  'uses' => 'ArticuloController@destroy',
  'as' => 'articulos.destroy'
]);

Route::get('proveedores/{id}/destroy', [
  'uses' => 'ProveedorController@destroy',
  'as' => 'proveedores.destroy'
]);


Route::get('clientes/{id}/destroy', [
  'uses' => 'ClienteController@destroy',
  'as' => 'clientes.destroy'
]);


Route::get('ingreso/{id}/destroy', [
  'uses' => 'IngresoController@destroy',
  'as' => 'ingreso.destroy'
]);

Route::get('venta/{id}/destroy', [
  'uses' => 'VentaController@destroy',
  'as' => 'venta.destroy'
]);

Route::get('admin/{id}/destroy', [
  'uses' => 'AdminController@destroy',
  'as' => 'admin.destroy'
]);


Route::resource('log','LogController');

Route::get('logout','LogController@logout');



Route::get('checkmail',function(){

    $email = Input::get('email');

    $user = User::all()->where('email', $email)->first();
    if ($user) {
        return Response::json('El email ya esta registrado en el sistema');
    } else {
        return Response::json('true');
    }
});


Route::get('reportecategorias','CategoriaController@reporte');
Route::get('reportearticulos','ArticuloController@reporte');
Route::get('reporteclientes','ClienteController@reporte');
Route::get('reporteproveedores','ProveedorController@reporte');
Route::get('reporteventas','VentaController@reporte');
Route::get('reporteventa/{id}','VentaController@reportec');
Route::get('reporteingresos','IngresoController@reporte');
Route::get('reporteingreso/{id}','IngresoController@reportec');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
