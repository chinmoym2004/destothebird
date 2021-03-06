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

Route::get('/','HomeController@getIndex');
Route::controller('home','HomeController');

Route::controller('users','UsersController');

Route::get('password/reset', array(
  'uses' => 'PasswordController@remind',
  'as' => 'password.remind'
));

Route::post('password/reset', array(
  'uses' => 'PasswordController@request',
  'as' => 'password.request'
));


Route::get('password/reset/{token}', array(
  'uses' => 'PasswordController@reset',
  'as' => 'password.reset'
));

Route::post('password/reset/{token}', array(
  'uses' => 'PasswordController@update',
  'as' => 'password.update'
));

Route::get('users/upload', array('before' => 'auth','UsersController@getUpload'));
Route::post('users/upload', array('before' => 'auth','UsersController@postUpload'));

Route::post('users/uploadedinfoupdate/{id}',array('UsersController@postUploadedinfoupdate'));

Route::post('users/uploadedinfodelete/{id}',array('UsersController@postUploadedinfodelete'));
Route::post('users/uploadimageforaudio',array('UsersController@postUploadimageforaudio'));

Route::get('users/setting',array('UsersController@getSetting'));
Route::post('users/setting',array('UsersController@postSetting'));


	
