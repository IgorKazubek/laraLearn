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

Route::get('/', function (){

    return view('welcome');

});
//
//Route::get('/tasks','TaskController@index')->middleware('auth');
//
//Route::post('/tasks/update/{task}', 'TaskController@edit');
//
//Route::get('/tasks/{task}', 'TaskController@show');
//
//Route::post('/tasks', 'TaskController@create');
//
//
//Auth::routes();
//
//Route::get('/home', 'HomeController@index')->name('home');
//
//
//Route::get('/posts', 'PostController@index');
//
//Route::post('/posts', 'PostController@store');
//
//Route::get('/posts/{post}', 'PostController@show');
//
//
//Route::post('/posts/create','PostController@create');
//
//Route::post('/posts/edit/{post}','PostController@edit');
//
//Route::patch('/posts/update/{post}', 'PostController@update');
//
//Route::delete('/posts/{post}', 'PostController@destroy');
//
//Route::post('/posts/{post}/comments','PostController@addComment');
//
//Route::get('/users', 'UserController@index')->middleware('auth');
//
//Route::post('/users/subscribe/{user}', 'UserController@subscribe');
//
//Route::delete('/users/unsubscribe/{user}', 'UserController@unSubscribe');
//
//Route::get('/ang', function(){
//    return view('testAng');
//});
//
//Route::group(['prefix' => 'api'], function (){
//   Route::get('userapi', 'UserApiController@getUserInformation');
//});