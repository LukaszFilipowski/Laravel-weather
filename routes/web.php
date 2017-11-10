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

Route::get('cities', 'CityController@index')->name('cities.index');
Route::get('cities/create', 'CityController@create')->name('cities.create');
Route::post('cities/create', 'CityController@store')->name('cities.store');
Route::get('cities/{id}/edit', 'CityController@edit')->name('cities.edit');
Route::put('cities/{id}/edit', 'CityController@store')->name('cities.update');
Route::get('cities/{id}/delete', 'CityController@delete')->name('cities.delete');
