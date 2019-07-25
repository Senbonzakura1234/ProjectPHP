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
Route::get('/view_post/{id}', 'HomePageController@viewPost');
Route::get('/post_by_category/{id}', 'HomePageController@categorySingle');
Route::get('/post_by_tag/{id}', 'HomePageController@tagSingle');
Route::get('/post_list', 'HomePageController@post_list');
Route::get('/randomPost', 'HomePageController@randomPost');
Route::get('/blog-single.php', function () {
    return view('blog-single');
});
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
    Route::resource('/message', 'MessageController')->except('create', 'store');
    Route::get('/comment', 'CommentController@listComment');
    Route::get('/commentByProperties/post/{postId}', 'CommentController@listCommentByProperties');
    Route::post('/change_comment_status_ajax', 'CommentController@changeStatus');
});
Route::get('/contact', 'MessageController@create')->name('createMessage');
Route::post('/contact/save', 'MessageController@store')->name('saveMessage');

Route::post('/post_comment/{id}', 'CommentController@post_comment');
Route::post('/post_comment_ajax/{id}', 'CommentController@post_comment_ajax');
