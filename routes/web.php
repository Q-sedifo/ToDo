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

// For authorized users
Route::middleware('auth')->group(function() {
    Route::get('/', 'App\Http\Controllers\IndexController@myDay')->name('my-day');
    Route::get('/home', 'App\Http\Controllers\IndexController@home')->name('home');
    Route::get('/tasklist/{id}', 'App\Http\Controllers\IndexController@taskList')->name('task-list');
    Route::get('/account', 'App\Http\Controllers\IndexController@account')->name('account');

    Route::get('/logout', 'App\Http\Controllers\AuthController@logout')->name('logout');
    Route::get('/tasklist/delete/{id}', 'App\Http\Controllers\TasklistController@delete')->name('tasklist-delete');

    Route::post('/task/create', 'App\Http\Controllers\TaskController@taskCreate')->name('task-create');
    Route::post('/task/delete/{id}', 'App\Http\Controllers\TaskController@taskDelete')->name('task-delete');
    Route::post('/task/complete/{id}', 'App\Http\Controllers\TaskController@taskComplete')->name('task-complete');
    Route::post('/tasklist/create', 'App\Http\Controllers\TasklistController@create')->name('tasklist-create');
});

// For unauthorized users
Route::middleware('guest')->group(function() {
    Route::get('/login', 'App\Http\Controllers\AuthController@login')->name('login');
    Route::post('/loginAction', 'App\Http\Controllers\AuthController@loginAction')->name('login-action');

    Route::get('/register', 'App\Http\Controllers\AuthController@register')->name('register');
    Route::post('/registerAction', 'App\Http\Controllers\AuthController@registerAction')->name('register-action');
});
