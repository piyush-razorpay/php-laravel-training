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

Route::post('/users', 'PersonsController@createPerson');
Route::get('/users', 'PersonsController@getAllPersons');
Route::get('/users/{id}', 'PersonsController@getPersonById');
Route::delete('/users/{id}', 'PersonsController@deletePersonById');
Route::patch('/users/{id}', 'PersonsController@updatePersonById');
