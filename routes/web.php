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


// Rotas dos Módulos
Route::get('/module','ModuleController@index')->name('moduleList');
Route::get('/module/create','ModuleController@create')->name('moduleCreate');
Route::get('/module/edit/{id}','ModuleController@edit')->name('moduleEdit');
Route::get('/module/delete/{id}','ModuleController@delete')->name('moduleDelete');
Route::post('/modules/update','ModuleController@update')->name('moduleUpdate');
Route::post('/module/store','ModuleController@store')->name('moduleStore');
Route::post('/module/destroy','ModuleController@destroy')->name('moduleDestroy');

// Rotas dos Sub-Módulos
Route::get('/submodule','SubmoduleController@index')->name('submoduleList');
Route::get('/submodule/create','SubmoduleController@create')->name('submoduleCreate');
Route::get('/submodule/edit/{id}','SubmoduleController@edit')->name('submoduleEdit');
Route::get('/submodule/delete/{id}','SubmoduleController@delete')->name('submoduleDelete');
Route::post('/submodule/update','SubmoduleController@update')->name('submoduleUpdate');
Route::post('/submodule/store','SubmoduleController@store')->name('submoduleStore');
Route::post('/submodule/destroy','SubmoduleController@destroy')->name('submoduleDestroy');

// Rotas dos Perfis
Route::get('/profile','ProfileController@index')->name('profileList');
Route::get('/profile/create','ProfileController@create')->name('profileCreate');
Route::get('/profile/edit/{id}','ProfileController@edit')->name('profileEdit');
Route::get('/profile/delete/{id}','ProfileController@delete')->name('profileDelete');
Route::post('/profile/update','ProfileController@update')->name('profileUpdate');
Route::post('/profile/store','ProfileController@store')->name('profileStore');
Route::post('/profile/destroy','ProfileController@destroy')->name('profileDestroy');

