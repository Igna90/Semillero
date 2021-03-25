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

Route::view('/', 'MainPage');

Auth::routes();

Route::get('logout', '\App\http\Controllers\Auth\LoginController@logout');
Route::view('privilegios', 'privilegios');

//Permisos por usuario logueado
Route::group(['middleware' => 'admin'], function () {
    Route::resource('usuario', 'UsuarioController');
    Route::get('/profile', 'ProfileController@index')->name('profile');
});
