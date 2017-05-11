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

Route::get('/', function () {
    return redirect('/login');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::group(['prefix' => 'admin','middleware' => 'auth'], function () {

    Route::get('/', 'AdminController@index')->name('admin');
    Route::get('disponibilidad', 'DisponibilidadController@index')->name('disponibilidad');
    Route::get('/cliente/buscar/{cedula}','CustomerController@buscar');
    Route::resource('cliente', 'CustomerController');
    Route::resource('contacto', 'ContactController');
    Route::resource('user', 'UserController');
    Route::resource('productService', 'ProductServiceController');
    Route::resource('presupuesto', 'PresupuestoController');

});
