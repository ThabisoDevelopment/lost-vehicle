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

Route::get('/', 'HomeController@index')->name('home');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/brands', 'BrandController@home');
Route::get('/brand/{id}', 'BrandController@show');
Route::get('/brand/create', 'BrandController@create');
Route::get('/brand/edit/{id}', 'BrandController@edit');
Route::post('/brands', 'BrandController@store');
Route::get('/brand/delete/{id}', 'BrandController@destroy');
Route::post('/brand/update/{id}', 'BrandController@update');
Route::get('/brand/deactivate/{id}', 'BrandController@deactivate');
Route::get('/brand/activate/{id}', 'BrandController@activate');

Route::get('/incidents', 'IncidentController@index');
Route::get('/incident/create', 'IncidentController@create');
Route::get('/incident/{id}', 'IncidentController@show');
Route::get('/incident/delete/{id}', 'IncidentController@destroy');
Route::get('/incident/deactivate/{id}', 'IncidentController@deactivate');
Route::get('/incident/activate/{id}', 'IncidentController@activate');

Route::post('/incident/create/step1', 'ClientController@createIncident');
Route::get('/incident/create/step1', 'ClientController@skip');
Route::post('/incident/create/step2', 'VehicleController@createIncident');
Route::post('/incident/create/step3', 'IncidentController@store');

Route::get('/clients', 'ClientController@index');
Route::post('/client/create', 'ClientController@store');
Route::get('/client/delete/{id}', 'ClientController@destroy');

Route::post('/search', 'SearchController@search');