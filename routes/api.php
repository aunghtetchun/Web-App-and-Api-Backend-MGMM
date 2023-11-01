<?php

use Illuminate\Http\Request;

    Route::get('/v1/game', array('uses' => 'ApiController@allGames'));
    Route::get('/v1/game/{id}','ApiController@gameListFilter');
    Route::post('/signup', 'AuthController@signup');
    Route::post('/login', 'AuthController@login');
    Route::group(['middleware' => 'auth:api'], function() {
        Route::get('logout', 'AuthController@logout');
        Route::get('getuser', 'ApiController@getUser');
        Route::post('/save-game', 'ApiController@saveGame');
        Route::post('/report-game', 'ApiController@reportGame');
        Route::post('/comment-game', 'ApiController@saveGameComment');
        Route::delete('/delete-save-game', 'ApiController@deleteGame');
    });
    Route::get('category', 'ApiController@getCategory');
    Route::get('/games', 'ApiController@getAllGames');
    Route::get('/games/category/{id}', 'ApiController@getAllGamesByCategory');
    Route::get('/games/popular', 'ApiController@getPopularGames');
    Route::get('/games/details/{slug}', 'ApiController@getGameDetails');
    Route::get('/games/related/{id}', 'ApiController@getRelatedGames');
    Route::get('/games/search/{search_value}', 'ApiController@searchGames');
    Route::post('/request-game', 'ApiController@requestGame');

    Route::get('/softwares', 'ApiController@getAllSoftwares');
    Route::get('/softwares/details/{slug}', 'ApiController@getSoftwareDetails');
    Route::get('/softwares/search/{search_value}', 'ApiController@searchSoftwares');
   
    Route::get('/adults', 'ApiController@getAllAdults');
    Route::get('/adults/details/{slug}', 'ApiController@getAdultDetails');
    Route::get('/adults/search/{search_value}', 'ApiController@searchAdults');
   
    Route::get('/accounts', 'ApiController@getAllAccounts');
    Route::get('/accounts/details/{id}', 'ApiController@getAccountDetails');
    Route::get('/accounts/search/{search_value}', 'ApiController@searchAccounts');
   
