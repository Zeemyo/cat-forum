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
// Route::get('index', 'FrontendController@index');

Route::get('/', 'PageController@index');





Route::get('/about', function () {
    return view('about');
});





// <!-- Page-->
Route::get('/readmore/{postingan}', 'PageController@readmore');
Route::get('/readmoreartikel/{artikel}', 'PageController@readmoreartikel');



Route::group(['middleware' => ['web']], function(){

  Auth::routes();

  Route::get('/home', 'HomeController@index')->name('home');

  // <!-- Dashboard-->

  Route::get('dashboard', 'DashboardController@index' );

  /* Route::get('anggota-dashboard', 'DashAnggotaController@index' ); */

  // <!-- Postingan-->
  Route::get('postingan', 'PostinganController@index' );
  Route::get('postingan/create', 'PostinganController@create' );
  Route::post('postingan', 'PostinganController@store' );
  Route::get('postingan/{postingan}', 'PostinganController@show');
  Route::get('postingan/{postingan}/edit', 'PostinganController@edit');
  Route::patch('postingan/{postingan}', 'PostinganController@update');
  Route::delete('postingan/{postingan}', 'PostinganController@destroy');
  Route::get('/search', 'PostinganController@search');



  // <!-- Category-->
  Route::get('Category', 'CategoryController@index' );
  Route::get('Category/create', 'CategoryController@create' );
  Route::post('Category', 'CategoryController@store' );
  Route::get('Category/{Category}/edit', 'CategoryController@edit');
  Route::patch('Category/{Category}', 'CategoryController@update');
  Route::delete('Category/{Category}', 'CategoryController@destroy');

// <!-- Users-->

Route::get('Users', 'UsersController@index' );
Route::get('Users/create', 'UsersController@create' );
Route::post('Users', 'UsersController@store' );
Route::get('Users/{Users}/edit', 'UsersController@edit');
Route::patch('Users/{Users}', 'UsersController@update');
Route::delete('Users/{Users}', 'UsersController@destroy');

// <!-- Artikel-->
Route::get('artikel', 'ArtikelController@index' );
Route::get('artikel/create', 'ArtikelController@create' );
Route::post('artikel', 'ArtikelController@store' );
Route::get('artikel/{artikel}', 'ArtikelController@show');
Route::get('artikel/{artikel}/edit', 'ArtikelController@edit');
Route::patch('artikel/{artikel}', 'ArtikelController@update');
Route::delete('artikel/{artikel}', 'ArtikelController@destroy');
Route::get('/search', 'ArtikelController@search');


});

Route::get('/forum','ForumController@index');
	Route::post('forum/create','ForumController@create');
	Route::get('/forum/{forum}/view','ForumController@view');
	Route::post('/forum/{forum}/view','ForumController@postkomentar');

Route::get('/comment/postingan/{id}','CommentsController@addcomment');
Route::resource('/comments','CommentsController');
/* Route::resource('/replies','RepliesController');
Route::post('replies', 'RepliesController@store' ); */
Route::delete('comments/{comments}', 'CommentsController@destroy');
Route::delete('comments/{postingan}', 'CommentsController@destroy');
/* Route::post('/replies/ajaxDelete','RepliesController@ajaxDelete'); */

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
