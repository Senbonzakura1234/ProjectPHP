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

Route::get('/', 'HomePageController@index');
Route::get('/about', 'HomePageController@about');
Route::get('/gift', 'HomePageController@gift');
Route::get('/view_post/{id}', 'HomePageController@viewPost');
Route::get('/view_dlc/{id}', 'HomePageController@viewDlc');
Route::get('/post_by_category/{id}', 'HomePageController@categorySingle');
Route::get('/post_by_tag/{id}', 'HomePageController@tagSingle');
Route::get('/post_list', 'HomePageController@post_list');
Route::get('/dlc_list', 'HomePageController@dlc_list');

Route::get('/category.php', function () {
    return view('category');
});
Route::get('/tag.php', function () {
    return view('tag');
});
Auth::routes();

Route::get('/admin', 'HomeController@index')->name('user');
Route::group(['prefix' =>'admin', 'middleware'=>'auth'], function(){
    Route::resource('/category','CategoryController');
    Route::resource('/tag','TagController');
    Route::resource('/post','PostController');
    Route::resource('/dlc','DlcController');
    Route::resource('/message', 'MessageController')->except('create', 'store');
    Route::get('/comment', 'CommentController@listComment');
//    Route::get('/commentByProperties/post/{postId}', 'CommentController@listCommentByProperties');
    Route::post('/change_comment_status_ajax', 'CommentController@changeStatus');
});
Route::get('/contact', 'MessageController@create')->name('createMessage');
Route::post('/contact/save', 'MessageController@store')->name('saveMessage');





Route::get('/randomPost', 'HomePageController@randomPost');
Route::group(['middleware'=>'auth'], function(){
	Route::get('/gift', 'HomePageController@gift');
	Route::get('/cart', 'HomePageController@cart');
	Route::get('/checkout', 'HomePageController@checkout');
	Route::get('/get_country_selected_phone_code', 'HomePageController@get_country_selected_phone_code');
	Route::post('/post_comment/{id}', 'CommentController@post_comment');
	Route::post('/post_comment_ajax/{id}', 'CommentController@post_comment_ajax');
	Route::post('/dlc_comment/{id}', 'CommentController@dlc_comment');
	Route::post('/dlc_comment_ajax/{id}', 'CommentController@dlc_comment_ajax');
	Route::post('/delete_comment_ajax', 'CommentController@deleteCommentAjax');
});
Route::get('auth/google', 'Auth\LoginController@redirectToGoogle');
Route::get('auth/google/callback', 'Auth\LoginController@handleGoogleCallback');
