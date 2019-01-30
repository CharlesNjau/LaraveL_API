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

//Get CompanyBio
Route::get('CompanyBio','CompanyDataController@index');

//Get CompanyBio by website
Route::get('CompanyBioWeb/{web_site}','CompanyDataController@GetBioByWeb');

//Get Employee by website
Route::get('AllEmployee','CompanyDataController@AllEmployee');

//Get Employee by website
Route::get('FetchEmployee/{id}','CompanyDataController@showme');


//Store Employee Detail
Route::post('AddEmployeeDetail','CompanyDataController@store');
