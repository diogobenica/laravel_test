<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', 'SessionsController@create');

Route::resource('pizzas', 'PizzasController');
Route::resource('users', 'UsersController');
Route::resource('ingredients', 'IngredientsController');
Route::resource('sales', 'SalesController');
Route::resource('sessions', 'SessionsController');
