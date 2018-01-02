<?php

Route::get('/', function () {
    return view('welcome');
});

Route::get('news','MakkahController@news');
Route::get('completepro','MakkahController@completepro');
Route::get('futurepro','MakkahController@futurepro');

Route::get( 'posts/{id}','MakkahController@postsDetails');

Route::post('posts/{id}/comment','CommentController@postComment');

Route::get('album','MakkahController@album');
/////////////////////////////////////////////
Auth::routes();

Route::group(['middleware' => ['auth','roles']], function () {

    Route::get('/admin', 'NewsController@index');
	Route::get('/admin/news', 'NewsController@show');

	Route::get('/admin/newsadd', 'NewsController@newsadd');
	Route::post('/admin/newsstore', 'NewsController@store');

	 Route::get('/admin/news/{id}/delete', 'NewsController@delete');

	Route::get('/admin/news/{id}/edit', 'NewsController@edit');
	Route::post('/admin/news/{id}/update', 'NewsController@update');

	/////////////////////project Complete
	Route::get('admin/projectcom', 'CompleteProController@show');
	Route::post('admin/projectcom', 'CompleteProController@store');
	Route::post('/admin/deletecom', 'CompleteProController@deletecom');

	 Route::get('/admin/editcom', 'CompleteProController@editcom');
	 Route::post('/admin/updatecom', 'CompleteProController@updatecom');

	/////////////////////project future
	Route::get('admin/projectfut', 'FutureProController@show');
	Route::post('admin/projectfut', 'FutureProController@store');
	Route::post('/admin/deletefut', 'FutureProController@deletefut');
    
	Route::get('admin/editfut', 'FutureProController@editfut');
	Route::post('admin/updatefut', 'FutureProController@updatefut');
});