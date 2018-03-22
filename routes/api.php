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
/*
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
*/
Route::group(['middleware' => 'cors'], function() {

Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout');
Route::post('users', 'Auth\RegisterController@register');

Route::group(['middleware' => 'auth:api'], function() {

    Route::get('agencies', 'AgencyController@index');
	Route::get('agencies/{agency}', 'AgencyController@show');
	Route::post('agencies', 'AgencyController@store');
	Route::put('agencies/{agency}', 'AgencyController@update');
	Route::delete('agencies/{agency}', 'AgencyController@delete');
	
	Route::get('users', 'UserConteroller@index');
	Route::get('users/{user}', 'UserConteroller@show');
	Route::put('users/{user}', 'UserConteroller@update');
	Route::delete('users/{user}', 'UserConteroller@delete');

    Route::get('professions', 'AtherDataController@getProfessions');
    Route::get('countriescities', 'AtherDataController@getPContriesCities');

    Route::post('searchagencies', 'SearchController@searchAgencies');
    Route::post('searchusers', 'SearchController@searchContacts');
});

});
