<?php

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


Route::get('/', 'GameController@popular');
Auth::routes([
  'register' => false, // Registration Routes...
  'reset' => false, // Password Reset Routes...
  'verify' => false, // Email Verification Routes...
]);
Route::view('/privacy-policy', 'privacy-policy');

Route::group(['middleware' => ['auth', 'verify.admin']], function () {
  Route::get('/home', 'HomeController@index')->name('home');
  Route::get('/sample', 'HomeController@sample')->name('sample');
  Route::get('/edit', 'ProfileController@edit')->name('profile.edit');
  Route::post('/change-password', 'ProfileController@changePassword')->name('profile.changePassword');
  Route::post('/change-name', 'ProfileController@changeName')->name('profile.changeName');
  Route::post('/change-email', 'ProfileController@changeEmail')->name('profile.changeEmail');
  Route::post('/change-photo', 'ProfileController@changePhoto')->name('profile.changePhoto');
  Route::resource('/category', 'CategoryController');
  Route::resource('/post', 'PostController');
  Route::resource('/popular', 'PopularController');
  Route::get('/review', 'PostController@reviewFilter')->name('post.reviewFilter');
  Route::get('/noreview', 'PostController@noreviewFilter')->name('post.noreviewFilter');
  Route::get('/apkaward','PostController@apkaward')->name('post.apkaward');
  //Route::get('/nodrive','PostController@nodriveFilter')->name('post.nodriveFilter');
  Route::get('/mod', 'PostController@modFilter')->name('post.modFilter');
  Route::get('/nomod', 'PostController@noModFilter')->name('post.noModFilter');
  Route::resource('/photo', 'PhotoController');
  Route::resource('/rating', 'RatingController');
  Route::resource('/suggest', 'SuggestController');
  Route::resource('/request_app', 'RequestAppController');
  Route::resource('/comment', 'CommentController');
  Route::resource('viewer', 'ViewerController');
  Route::resource('/adult','AdultController');
  Route::get('/show_rating/{id}', 'PostController@showRating')->name('post.showRating');
  Route::get('/show_comment/{id}', 'PostController@showComment')->name('post.showComment');
  Route::delete('/viewer_del/{id}', 'PostController@viewerDel')->name('post.viewerDel');
  Route::get('/popularDel/', 'PopularController@destroyAll')->name('popular.destroyAll');

  Route::resource('/ads', 'AdsController');
  Route::resource('/software', 'SoftwareController');
  Route::post('/background', 'PhotoController@changeBackground')->name('photo.changeBackground');
  Route::get('/user-list', 'HomeController@userList')->name('user.userList');
  Route::post('/send-message', 'HomeController@sendMessage')->name('user.sendMessage');
  Route::get('/message-list', 'HomeController@messageList')->name('user.messageList');
  Route::delete('/aphoto/{id}', 'PhotoController@adestroy')->name('aphoto.destroy');



  //crawler
  Route::get('/crawler/add-game','ScraperController@addGame')->name('scraper.addGame');
  Route::get('/crawler/game-list','ScraperController@gameList')->name('scraper.gameList');
  Route::post('/crawler/store-game','ScraperController@storeGame')->name('scraper.storeGame');
  Route::get('/crawler/test','ScraperController@test2')->name('scraper.test2');
  Route::get('/crawler/update-game','ScraperController@updateGame')->name('scraper.updateGame');

});
//Route::get('/ads.txt', function() {
//  return File::get(public_path() . '/ads.txt');
//});
// Route::get('/privacy-policy.html', function() {
//     return File::get(public_path() . '/privacy-policy.html');
// });

Route::post('/report', 'GameController@reportBrokenLink')->name('reportBrokenLink');
Route::get('/request_game/create', 'GameController@createRequest')->name('requestGame.createRequest');
Route::post('/request_game', 'GameController@storeRequest')->name('requestGame.storeRequest');
Route::post('/add_rating', 'GameController@storeRating')->name('addRating.storeRating');
Route::post('/comment_game', 'GameController@storeComment')->name('commentGame.storeComment');
Route::get('/our_team', 'GameController@adGame')->name('adGame');

Route::get('/show_comment/{id}', 'GameController@showComment')->name('post.showComment');
Route::get('/game', 'GameController@gameList')->name('game.gameList');
Route::get('/game/{id}', 'GameController@gameListFilter')->name('game.gameListFilter');
Route::get('/single_game_list/{id}', 'GameController@singleGameList');
Route::get('/games/{slug}', 'GameController@singleGame')->name('game.singleGameList');
Route::get('/game_search', 'GameController@gameSearch')->name('game.gameSearch');

// Route::post('/g_version','GVersionController@store')->name('gVersion.store');
Route::get('/download/{slug}/{name}/{type}', 'GameController@download')->name('download');
Route::get('/download_game/{slug}', 'GameController@downloadGame')->name('game.download');


Route::get('/softwares', 'GameController@softwareList')->name('software.softwareList');
Route::get('/softwares/{slug}', 'GameController@singleSoftwareList')->name('software.singleSoftwareList');
Route::get('/software_search', 'GameController@softwareSearch')->name('software.softwareSearch');
Route::get('/download_software/{slug}', 'GameController@softwareDownload')->name('software.download');
Route::get('/sitemap', 'GameController@generateSitemap');



Route::group(['middleware' => ['auth', 'isSeller']], function () {
  Route::resource('/skin', 'SkinController');
  Route::resource('/account', 'AccountController');
  Route::resource('/seller', 'SellerController');
});