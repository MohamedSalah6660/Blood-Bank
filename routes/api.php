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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix'=> 'v1' , 'namespace' => 'Api'], function() {

     
	Route::get('governorates', 'MainController@governorates');

	Route::get('cities', 'MainController@cities');

	Route::post('register', 'AuthController@register');
	Route::post('login', 'AuthController@login');

	Route::post('reset-password', 'AuthController@reset');
	Route::post('new-password', 'AuthController@password');


	Route::get('clients', 'MainController@clients');


Route::group(['middleware'=> 'auth:api' ], function(){

	
	Route::post('register-token', 'AuthController@registerToken');

	Route::post('remove-token', 'AuthController@removeToken');

	Route::get('posts', 'MainController@posts');

	Route::get('categories', 'MainController@categories');

	Route::get('bloodtype', 'MainController@bloodtype');

	Route::post('donations_form', 'MainController@donations_form');

	Route::get('donations_requests', 'MainController@donations_requests');

	Route::post('reports', 'MainController@reports');

	Route::post('contacts', 'MainController@contacts');

	Route::get('notifications', 'MainController@notifications');

	Route::put('profile', 'MainController@profile');

	Route::get('settings', 'MainController@settings');



	Route::post('notificationsSettings' , 'MainController@notificationsSettings');

 
});

});


