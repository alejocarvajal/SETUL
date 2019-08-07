<?php

Route::get('/', function () {
   return 'Home';
});
Auth::routes(['register' => false]);
Route::get('/admin', 'AdminController@index');

Route::get('/users', 'UserController@index')
    ->name('users.index');

Route::get('/users/{user}', 'UserController@show')
    ->where('user', '[0-9]+')
    ->name('users.show');

Route::get('/users/new', 'UserController@create')->name('users.create');

Route::post('/users', 'UserController@store');

Route::get('/users/{user}/edit', 'UserController@edit')->name('users.edit');

Route::put('/users/{user}', 'UserController@update');

Route::delete('/users/{user}', 'UserController@destroy')->name('users.destroy');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
