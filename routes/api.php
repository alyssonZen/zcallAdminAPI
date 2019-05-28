<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('auth/login', 'Api\AuthController@login');
Route::post('auth/refresh', 'Api\AuthController@refresh');
Route::post('auth/logout', 'Api\AuthController@logout');
Route::group(['namespace' => 'Api', 'middleware' => 'jwt.auth'], function(){
	Route::prefix('/auth')->group(function(){
		Route::get('/me', 'AuthController@me')->name('api.me_auth');
	});
	Route::prefix('/clientes')->group(function(){
		Route::get('/', 'ClienteController@index')->name('api.index_cliente');
		Route::get('/{id}', 'ClienteController@show')->name('api.show_cliente');
		Route::post('/', 'ClienteController@store')->name('api.store_cliente');
		Route::put('/{id}', 'ClienteController@update')->name('api.update_cliente');
		Route::delete('/{id}', 'ClienteController@delete')->name('api.delete_cliente');
	});
});
/*
Route::group(['namespace' => 'Api'], function(){
	Route::prefix('/clientes')->group(function(){
		Route::get('/', 'ClienteController@index')->name('api.index_cliente');
		Route::get('/{id}', 'ClienteController@show')->name('api.show_cliente');
		Route::post('/', 'ClienteController@store')->name('api.store_cliente');
		Route::put('/{id}', 'ClienteController@update')->name('api.update_cliente');
		Route::delete('/{id}', 'ClienteController@delete')->name('api.delete_cliente');
	});
});
*/
