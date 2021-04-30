<?php

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
Route::middleware('auth')->group(function(){
    Route::get('posts/trashed-post','PostController@trashedPost')->name('posts.trashed');
    Route::delete('posts/force-delete/{post}','PostController@forceDestroy')->name('posts.force-delete');
    Route::resources([
        'categories' => 'CategoriesController',
        'posts' => 'PostController',
        'tags' => 'TagController'
    ]);
    Route::put('posts/restore-post/{post}','PostController@restorePost')->name('posts.restore');
});
