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
    Route::get('orderServicio', 'OrderServicioController@index')->name('ordenServicio');
    Route::get('cronograma', 'CronogramaController@index')->name('cronograma');
    Route::get('/cliente/buscar/{cedula}','CustomerController@buscar');
    Route::resource('cliente', 'CustomerController');
    Route::resource('contacto', 'ContactController');
    Route::resource('user', 'UserController');
    Route::resource('productService', 'ProductServiceController');
    Route::resource('presupuesto', 'PresupuestoController');

    Route::get('evento/buscarNombreEvento/{value}','EventoController@buscarNombreEvento');
    Route::get('evento/buscarCodigoEvento/{value}','EventoController@buscarCodigoEvento');
    Route::get('evento/autoIncrementoEvento','EventoController@autoIncrementoEvento');
    Route::resource('evento', 'EventoController');

    Route::get('salon/buscarNombreSalon/{value}','SalonController@buscarNombreSalon');
    Route::get('salon/buscarCodigoSalon/{value}','SalonController@buscarCodigoSalon');
    Route::get('salon/autoIncrementoSalon','SalonController@autoIncrementoSalon');
    Route::resource('salon', 'SalonController');

    Route::get('montaje/buscarNombreMontaje/{value}','MontajeController@buscarNombreMontaje');
    Route::get('montaje/buscarCodigoMontaje/{value}','MontajeController@buscarCodigoMontaje');
    Route::get('montaje/autoIncrementoMontaje','MontajeController@autoIncrementoMontaje');
    Route::resource('montaje', 'MontajeController');

    Route::get('alimento/buscarNombreAlimento/{value}','AlimentoController@buscarNombreAlimento');
    Route::get('alimento/buscarCodigoAlimento/{value}','AlimentoController@buscarCodigoAlimento');
    Route::get('alimento/autoIncrementoAlimento','AlimentoController@autoIncrementoAlimento');
    Route::resource('alimento', 'AlimentoController');

    Route::get('bebida/buscarNombreBebida/{value}','BebidaController@buscarNombreBebida');
    Route::get('bebida/buscarCodigoBebida/{value}','BebidaController@buscarCodigoBebida');
    Route::get('bebida/autoIncrementoBebida','BebidaController@autoIncrementoBebida');
    Route::resource('bebida', 'BebidaController');

    Route::get('material/buscarNombreMaterial/{value}','MaterialController@buscarNombreMaterial');
    Route::get('material/buscarCodigoMaterial/{value}','MaterialController@buscarCodigoMaterial');
    Route::get('material/autoIncrementoMaterial','MaterialController@autoIncrementoMaterial');
    Route::resource('material', 'MaterialController');

    Route::get('habitacion/buscarNombreHabitacion/{value}','HabitacionController@buscarNombreHabitacion');
    Route::get('habitacion/buscarCodigoHabitacion/{value}','HabitacionController@buscarCodigoHabitacion');
    Route::get('habitacion/autoIncrementoHabitacion','HabitacionController@autoIncrementoHabitacion');
    Route::resource('habitacion', 'HabitacionController');

    Route::get('otroServicio/buscarNombreOtroServicio/{value}','OtroServicioController@buscarNombreOtroServicio');
    Route::get('otroServicio/buscarCodigoOtroServicio/{value}','OtroServicioController@buscarCodigoOtroServicio');
    Route::get('otroServicio/autoIncrementoOtroServicio','OtroServicioController@autoIncrementoOtroServicio');
    Route::resource('otroServicio', 'OtroServicioController');

});
