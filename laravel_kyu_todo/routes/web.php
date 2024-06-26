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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/login', 'Auth\LoginController@login');
Route::post('/logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('/register', 'Auth\RegisterController@register');

Route::get('/', 'HomeController@index');

Route::get('/home', 'HomeController@index')->name('home');

Route::resource("goals", "GoalController")->middleware('auth');

Route::resource("goals.todos", "TodoController")->middleware('auth');

Route::post('/goals/{goal}/todos/{todo}/sort', 'TodoController@sort')->middleware('auth');

Route::resource("tags", "TagController")->middleware('auth');

Route::post('/goals/{goal}/todos/{todo}/tags/{tag}', 'TodoController@addTag')->middleware('auth');

Route::delete('/goals/{goal}/todos/{todo}/tags/{tag}', 'TodoController@removeTag')->middleware('auth');

Auth::routes();

