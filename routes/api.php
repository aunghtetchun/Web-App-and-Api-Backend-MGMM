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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

//Route::get('/v1/game/{key}', [
//    'middleware' => 'App\Http\Middleware\ApiKey',
//    function () {
//        return view('welcome');
//    }]);

// Route::group(['middleware' => ['ApiKey']], function () {
//     Route::get('/v1/popular', array('uses' => 'ApiController@popularGames'));
//     Route::get('/v1/news', array('uses' => 'ApiController@news'));
//     Route::get('/v1/news/{id}', array('uses' => 'ApiController@new'));
//     Route::get('/v1/games', array('uses' => 'ApiController@allGames'));
//     Route::get('/v1/category', array('uses' => 'ApiController@category'));
//     Route::get('/v1/category/{id}', array('uses' => 'ApiController@byCategory'));
//     Route::get('/v1/ads','ApiController@ads');
//     Route::post('/v1/request', array('uses' => 'ApiController@requestGame'));
//     Route::get('/v1/version', array('uses' => 'ApiController@version'));
//     Route::get('/v1/related/{id}', array('uses' => 'ApiController@relatedGames'));
//     Route::post('/v1/game_search','ApiController@search');
// });
