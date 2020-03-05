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
Route::get('/home', 'HomeController@index')->name('home');

// Reemplazo el auth por las rutas que necesito
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

Route::resource('/ticket', 'ticketController');

Route::middleware(['administrador'])->group(function () {
    Route::namespace('administrador')->group(function () {
        Route::prefix('administrador')->group(function () {
            Route::name('administrador_')->group(function () {
                Route::get('/', 'HomeController@index')->name('index');
            });
        });
    });
});

Route::middleware(['usuario'])->group(function () {
    Route::namespace('usuario')->group(function () {
        Route::prefix('usuario')->group(function () {
            Route::name('usuario_')->group(function () {
                Route::get('/', 'HomeController@index')->name('index');
                Route::post('/', 'HomeController@asignarTicket')->name('asignarTicket');
            });
        });
    });
});
