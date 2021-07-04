<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
//Route::get('/categories', 'CategoryController@index')->name('categories.index');
//Route::get('/posts', 'PostController@index')->name('index');

Route::prefix('admin')
    ->namespace('Admin')
    ->middleware('auth')
    ->name("admin.")
    ->group(function () {
        Route::get('/', 'HomeController@index')->name('home');
        Route::post('/posts', 'PostController@store')->name('posts.store');
        Route::get('/posts', 'PostController@index')->name('posts.index');
        Route::get('/posts/create','PostController@create')->name('posts.create');

        Route::get('/posts/all', "PostController@allmine")->name("posts.all");
        Route::get('/posts/latest', "PostController@lastposts")->name("posts.latest");

        Route::get('/posts/{id}', "PostController@show")->name("posts.show");
        Route::match(["PUT", "PATCH"], '/posts/{Id}', 'PostController@update')->name('posts.update');
        Route::delete('/posts/{Id}', 'PostController@destroy')->name('posts.destroy');
        Route::get('/posts/{post}/edit', 'PostController@edit')->name('posts.edit');
        
    });


