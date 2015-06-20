<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => "auth", 'namespace' => "Auth"], function () {
    Route::get('connect', array('uses' => "AuthController@redirectToProvider", 'as' => "auth.connect"));
    Route::get('callback', array('uses' => "AuthController@handleProviderCallback", 'as' => "auth.callback"));
    Route::get('logout', array('as' => 'auth.logout', function(){
    	Auth::logout();
    	return redirect('/');
    }));
});
