<?php
header('Access-Control-Allow-Origin: *');
header("Content-Type: multipart/form-data; charset=utf-8");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');

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


Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout');
Route::post('adduser', 'Auth\RegisterController@register');

Route::group(['middleware' => 'auth:api'], function() {

    Route::get('getagencies', 'AgencyController@index');
	Route::get('getagency/{agency}', 'AgencyController@show');
	Route::post('addagency', 'AgencyController@store');
	Route::post('updateagency/{agency}', 'AgencyController@update');
	Route::delete('deleteagency/{agency}', 'AgencyController@delete');
	
	Route::get('getusers', 'UserConteroller@index');
	Route::get('getuser/{user}', 'UserConteroller@show');
    Route::get('getuserAdminstrator/{user}', 'UserConteroller@showAdmistrator');
	Route::post('updateuser/{user}', 'UserConteroller@update');
    Route::post('updateuserAdminstrator/{user}', 'UserConteroller@updateAdminstrator');
	Route::delete('deleteuser/{user}', 'UserConteroller@delete');

    Route::get('getprofessions', 'AtherDataController@getProfessions');
    Route::get('getcountriescities', 'AtherDataController@getPContriesCities');

    Route::post('searchagencies', 'SearchController@searchAgencies');
    Route::post('searchcontacts', 'SearchController@searchContacts');
});
