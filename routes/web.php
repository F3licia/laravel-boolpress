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

//Route::get('/home', 'HomeController@index')->name('home');
//Route::get('/tags', 'TagController@index')->name('tags.index');
//Route::get('/categories', 'CategoryController@index')->name('categories.index');
//Route::get('/posts/public', 'PostController@publichome')->name('public');

Route::get('/posts', 'PostController@index')->name('index');
Route::get('/posts/{slug}', "PostController@show")->name("posts.show");

Route::prefix('user')
    ->namespace('user')
    ->middleware('auth')
    ->name("user.")
    ->group(function () {
        Route::get('/', 'HomeController@index')->name('home');
        Route::post('/posts', 'PostController@store')->name('posts.store');
        Route::get('/posts', 'PostController@index')->name('posts.index');
        Route::get('/posts/create','PostController@create')->name('posts.create');

        Route::get("/posts/filter", "PostController@filter")->name('posts.filter');//non hanno view, tornano a index con nuovi dati passati dal 'with->'
        Route::get('/posts/mine', "PostController@allmine")->name("posts.mine"); //
        Route::get('/posts/latest', "PostController@lastposts")->name("posts.latest");//

        Route::get('/posts/{slug}', "PostController@show")->name("posts.show");
        Route::match(["PUT", "PATCH"], '/posts/{post}', 'PostController@update')->name('posts.update');
        Route::delete('/posts/{Id}', 'PostController@destroy')->name('posts.destroy');
        Route::get('/posts/{post}/edit', 'PostController@edit')->name('posts.edit');
       
        
    });


