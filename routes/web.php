<?php
use App\City;
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

//Web-Client
Route::group(['prefix'=> 'client'] , function(){


Route::get('login','AuthClientController@login')->name('client.login');
Route::post('login','AuthClientController@login_post');

  
Route::get('register/create', 'AuthClientController@create');
Route::post('register/store', 'AuthClientController@store')->name('registerclient.store');

//Reset Password


Route::get('/password/reset' , 'ForgotPasswordController@showLinkRequestForm')->name('client.password.request');

Route::post('/password/email' , 'ForgotPasswordController@sendResetLinkEmail')->name('client.password.email');


Route::post('/password/reset' , 'ResetPasswordController@reset');

Route::get('/password/reset/{token}' , 'ResetPasswordController@showResetForm')->name('clientpasswordreset');

//Verify Email

Route::get('verifyEmailFirst' , 'AuthClientController@verifyEmailFirst')->name('verifyEmailFirst');

Route::get('verify/{email}/{verifyToken}', 'AuthClientController@sendEmailDone')->name('sendEmailDone');




Route::get('home', 'HomePageController@homepage');
Route::get('home', 'HomePageController@index');


Route::get('information/create/ajax-state',function()
{
    $governerate_id = request('governerate_id');
    $subgovernates = City::where('governerate_id','=',$governerate_id)->get();
    return $subgovernates;
 
});


Route::get('post/{post_title}', 'PostController@show')->name('showpost');

Route::get('patientdetails/{donation_phone}', 'DonationController@donation_details')->name('donationdetails');

Route::get('about', 'AboutController@index');


Route::get('search', 'HomePageController@search')->name('search');
Route::get('allposts', 'PostController@allposts')->name('search');



Route::group(['middleware'=>'auth:web-client'], function() {

Route::get('donationrequest/create', 'DonationController@create');

Route::post('donationrequest/store', 'DonationController@store')->name('donationrequest.store');


Route::any('logout', 'AuthClientController@logout')->name('clientlogout');

Route::get('profile/edit' , 'ProfileController@edit')->name('clientedit');

Route::put('profile/update' , 'ProfileController@update')->name('clientupdate');



Route::get('contact', 'ContactController@create')->name('contactclient.create');
Route::post('contact', 'ContactController@store')->name('contactclient.store');



Route::get('report', 'ReportController@create')->name('creporttclient.create');
Route::post('report', 'ReportController@store')->name('reportclient.store');

});



});







Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');




// Admin Panel


Route::group(['middleware'=>'auth:web' , 'namespace'=>'Admin' , 'prefix'=>'admin'], function()
{

Route::any('logout', 'AdminAuthController@logout')->name('logout');

Route::resource('governorate' ,'GovernorateController');
Route::delete('governorates', ['as'=>'governorate.delete', 'uses'=>'GovernorateController@delete']);


Route::resource('city' ,'CityController');
Route::delete('cities', ['as'=>'city.delete', 'uses'=>'CityController@delete']);


Route::resource('category' ,'CategoryController');
Route::delete('categories', ['as'=>'category.delete', 'uses'=>'CategoryController@delete']);


Route::resource('post' ,'PostController');
Route::delete('posts', ['as'=>'post.delete', 'uses'=>'PostController@delete']);


Route::resource('contact' ,'ContactController');
Route::delete('contacts', ['as'=>'contact.delete', 'uses'=>'ContactController@delete']);

Route::resource('report' ,'ReportController');
Route::delete('reports', ['as'=>'report.delete', 'uses'=>'ReportController@delete']);


Route::resource('donation' ,'DonationController');
Route::delete('donations', ['as'=>'donation.delete', 'uses'=>'DonationController@delete']);


Route::resource('client' ,'ClientController');
Route::delete('clients', ['as'=>'client.delete', 'uses'=>'ClientController@delete']);


Route::resource('setting' ,'SettingController');

});

	