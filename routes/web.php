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
    return view('welcome');
});

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
