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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function(){
	return view('home');
});

Route::resource('blog', 'BlogController');

Route::get('contact', 'ContactController@index');

Route::get('about', 'AboutController@index');

Route::get('admin', 'AdminController@index')->middleware('auth');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('search', 'SearchController@index');


Route::resource('pages', 'pageController');
Route::get('/{url}', 'PageController@show');






