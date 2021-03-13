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

Route::get('/','ModuleController@index')->name('moduleList');
Route::get('/module/create','ModuleController@create')->name('moduleCreate');
Route::post('/module/store','ModuleController@store')->name('moduleStore');
