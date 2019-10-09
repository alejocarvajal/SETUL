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

Route::get('/', 'juegoController@index');
Route::get('/juego/participante/{participante}', 'juegoController@reglas')->name('juego.index');
Route::post('/juego/participante/start/{participante}', 'juegoController@start')->name('juego.start');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin', 'adminController@index');

/*RUTAS DE USUARIOS*/
Route::get('/admin/users/{user}', 'AdminController@show')
    ->where('user', '[0-9]+')
    ->name('users.show');
Route::get('/admin/users/new', 'AdminController@create')->name('users.create');
Route::get('/admin/users/{user}/edit', 'AdminController@edit')->name('users.edit');
Route::post('/admin/users', 'AdminController@store');
Route::put('/admin/users/{user}', 'AdminController@update');
Route::delete('/admin/users/{user}', 'AdminController@destroy')->name('users.destroy');

/*RUTAS DE ASIGNATURAS*/
Route::get('/admin/asignatura', 'AsignaturaController@index');
Route::get('/admin/asignatura/new','AsignaturaController@create')->name("asignatura.create");
Route::get('/admin/asignatura/{asignatura}/edit','AsignaturaController@edit')->name('asignatura.edit');
Route::post('/admin/asignatura','AsignaturaController@store');
Route::put('/admin/asignatura/{asignatura}', 'AsignaturaController@update');
Route::delete('/admin/asignatura/{asignatura}', 'AsignaturaController@destroy')->name('asignatura.destroy');

/*RUTAS DE TEST*/
Route::get('/admin/tests', 'TestController@index');
Route::get('/admin/tests/new','TestController@create')->name("test.create");
Route::get('/admin/tests/{test}/edit','TestController@edit')->name('test.edit');
Route::post('/admin/tests','TestController@store');
Route::put('/admin/tests/{test}', 'TestController@update')->name('test.update');
Route::delete('/admin/tests/{test}', 'TestController@destroy')->name('test.destroy');

/*RUTAS DE PREGUNTA*/
Route::get('/admin/preguntas', 'PreguntaController@index');
Route::get('/admin/preguntas/new','PreguntaController@create')->name("pregunta.create");
Route::get('/admin/preguntas/{pregunta}/edit','PreguntaController@edit')->name('pregunta.edit');
Route::post('/admin/preguntas','PreguntaController@store');
Route::put('/admin/preguntas/{pregunta}', 'PreguntaController@update')->name('pregunta.update');
Route::delete('/admin/preguntas/{pregunta}', 'PreguntaController@destroy')->name('pregunta.destroy');
Route::get('/admin/preguntas/export', 'PreguntaController@export')->name('export');
Route::get('/admin/preguntas/importView', 'PreguntaController@importView');
Route::post('/admin/preguntas/import', 'PreguntaController@import')->name('import');

/*RUTAS DE PARTICIPANTE*/
Route::get('/admin/participantes', 'ParticipanteController@index');
Route::get('/admin/participantes/new','ParticipanteController@create')->name("participante.create");
Route::get('/admin/participantes/{participante}/edit','ParticipanteController@edit')->name('participante.edit');
Route::post('/admin/participantes','ParticipanteController@store');
Route::put('/admin/participantes/{participante}', 'ParticipanteController@update')->name('participante.update');
Route::delete('/admin/participantes/{participante}', 'ParticipanteController@destroy')->name('participante.destroy');
Route::get('/admin/participantes/export', 'ParticipanteController@export')->name('export');
Route::get('/admin/participantes/importView', 'ParticipanteController@importView');
Route::post('/admin/participantes/import', 'ParticipanteController@import')->name('import');

/*RUTAS DE COONFIGURACION*/
Route::get('/admin/config', 'ConfigController@index');
Route::get('/admin/config/new','ConfigController@create')->name("config.create");
Route::get('/admin/config/{configuracion}/edit','ConfigController@edit')->name('config.edit');
Route::post('/admin/config','ConfigController@store');
Route::put('/admin/config/{configuracion}', 'ConfigController@update')->name('config.update');
Route::delete('/admin/config/{configuracion}', 'ConfigController@destroy')->name('config.destroy');