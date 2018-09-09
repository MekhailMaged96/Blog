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



Route::group(['middleware'=>['web']],function() {

    Route::get('blog/{slug}',['as'=>'blog.single','uses'=>'BlogController@getSingle'])
    ->where('slug','[\w\d\-\_]+');
    
    Route::get('blog',['as'=>'blog.index','uses'=>'BlogController@getIndex']);

    Route::get('/','PagesController@getIndex');

    Route::get('/about','PagesController@getAbout');
    
    Route::get('/contact','PagesController@getContact');

    Route::post('/contact','PagesController@postContact');

    // comments 
    Route::post('comment/{post_id}',['as' =>'comment.store','uses'=>'CommentController@store']);

    Route::get('comment/{id}/edit',['as' =>'comment.edit','uses'=>'CommentController@edit']);
    Route::put('comment/{id}',['as' =>'comment.update','uses'=>'CommentController@update']);
    Route::get('comment/{id}/delete',['as' =>'comment.delete','uses'=>'CommentController@delete']);
    Route::delete('comment/{id}',['as' =>'comment.destroy','uses'=>'CommentController@destroy']);






    Route::get('/logout', 'Auth\LoginController@logout')->name('logout' );
    Route::resource('posts','PostController');

    Route::resource('catagories','CatagoryController');
    Route::resource('tags','TagController');
    Auth::routes();



});




