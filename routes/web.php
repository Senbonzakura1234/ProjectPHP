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

Route::get('/', 'HomePageController@index')->name('homepage');
Route::get('/about', 'HomePageController@about');
Route::get('/gift', 'HomePageController@gift');
Route::get('/view_post/{id}', 'HomePageController@viewPost');
Route::get('/view_dlc/{id}', 'HomePageController@viewDlc');
Route::get('/post_by_category/{id}', 'HomePageController@categorySingle');
Route::get('/post_by_tag/{id}', 'HomePageController@tagSingle');
Route::get('/post_list', 'HomePageController@post_list');
Route::get('/dlc_list', 'HomePageController@dlc_list');
Route::get('/dlc_list/{id}', 'HomePageController@dlc_list_by_game');
Route::get('/category_list', 'HomePageController@cateListAll');
Route::get('/publisher_list', 'HomePageController@tagListAll');

Route::get('/del_account', function () {
    return view('delaccount');
});
Route::get('/category.php', function () {
    return view('category');
});
Route::get('/homeAdmin', function () {
    return view('home2');
});
Route::get('/tag.php', function () {
    return view('tag');
});
Auth::routes();

Route::get('/admin', 'HomeController@index')->name('user')->middleware('role');
Route::group(['prefix' =>'admin', 'middleware'=>['auth','role']], function(){
    Route::resource('/category','CategoryController');
    Route::resource('/tag','TagController');
    Route::resource('/post','PostController');
    Route::resource('/dlc','DlcController');
    Route::resource('/gallery','GalleryController')->except('index', 'show');
	Route::get('/gallery/game/{id}', 'GalleryController@showGame')->name('galleryGame');
	Route::get('/gallery/dlc/{id}', 'GalleryController@showDlc')->name('galleryDlc');
    Route::resource('/message', 'MessageController')->except('create', 'store');
    Route::get('/comment', 'CommentController@listComment');
//    Route::get('/commentByProperties/post/{postId}', 'CommentController@listCommentByProperties');
    Route::post('/change_comment_status_ajax', 'CommentController@changeStatus');
});
Route::group(['prefix' =>'admin', 'middleware'=>['auth','master']], function(){
    Route::get('/ql_user', 'UserController@listUser');
    Route::post('/change_user_role', 'UserController@changeStatus');
});



Route::get('/contact', 'MessageController@create')->name('createMessage');
Route::post('/contact/save', 'MessageController@store')->name('saveMessage');




Route::get('/randomPost', 'HomePageController@randomPost');
Route::group(['middleware'=>'auth'], function(){
	Route::get('/gift', 'HomePageController@gift');
	Route::get('/cart', 'HomePageController@cart');
	Route::get('/checkout', 'HomePageController@checkout')->name('checkout');
	Route::get('/get_country_selected_phone_code', 'HomePageController@get_country_selected_phone_code');
	Route::post('/post_comment/{id}', 'CommentController@post_comment');
	Route::post('/post_comment_ajax/{id}', 'CommentController@post_comment_ajax');
	Route::post('/dlc_comment/{id}', 'CommentController@dlc_comment');
	Route::post('/dlc_comment_ajax/{id}', 'CommentController@dlc_comment_ajax');

    Route::post('/delete_comment_ajax', 'CommentController@deleteCommentAjax');

    Route::get('/user', 'HomePageController@userProfile')->name('user_profile');
    Route::get('/edit_profile', 'HomePageController@editProfile')->name('profile_edit');
    Route::post('/save_profile', 'HomePageController@saveProfile');

    Route::get('/add_to_cart/{id}','HomePageController@getAddtoCart');
    Route::get('/add_dlc_to_cart/{id}','HomePageController@getDlctoCart');

    Route::get('/del_cart/{id}','HomePageController@getDelItemCart');
    Route::get('/del_all_cart','HomePageController@delAllCart');
    Route::post('dat_hang',[
        'as'=>'dathang',
        'uses'=>'HomePageController@postCheckout'
    ]);

});
Route::get('auth/google', 'Auth\LoginController@redirectToGoogle');
Route::get('auth/google/callback', 'Auth\LoginController@handleGoogleCallback');
