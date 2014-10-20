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

Route::get('/', function(){
	if(Auth::user()->route)
		return Redirect::to(Auth::user()->route);
	else
		return Redirect::to('user/profile');
})->before('auth');

// Users route
Route::get('user/profile', 'UserController@getProfile')->before('auth');
Route::controller('user', 'UserController');

Route::group(array('before' => 'auth'), function(){
	Route::post('network/delete', 'NetworkController@postDelete');
	Route::post('network/{id}/node/delete', 'NetworkNodeController@postDelete');
	Route::resource('network', 'NetworkController');
	Route::resource('network.node', 'NetworkNodeController');
});

//Route::group(array('prefix' => 'api/v1', 'before' => 'auth'), function(){
//	Route::resource('user', 'controllers\api\v1\UserController');
//	Route::resource('network', 'controllers\api\v1\NetworkController');
//});

Route::group(array('prefix' => 'api/meos/v1'), function(){
	Route::resource('node', 'controllers\api\meos\v1\NodeController');
});

Route::get('/fake/node', function(){
	$nodes = Network::find(1)->nodes()->lastlog()
		->skip(Input::get('start'))->take(Input::get('length'));

	return $nodes->get()->count();
});