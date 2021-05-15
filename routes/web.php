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

Route::post('subscribe', 'WelcomeController@subscribe')->name('subscribe');
//Route::get('/','WelcomeController@index')->name('welcome');
// Generates /users & /users/page/{page}
Route::paginate('/', 'WelcomeController@index')->name('welcome');
Route::paginate('categories/type/{category}', 'WelcomeController@viewPostOfCategory')->name('categories.posts');
Route::paginate('tags/{tag}', 'WelcomeController@viewPostOfTag')->name('tags.posts');
//Route::paginate('search/type/{category}', 'WelcomeController@viewPostOfCategory')->name('categories.posts');
Route::get('post/{postSlugId}', 'WelcomeController@viewPost')->name('posts.detail');

Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');
Route::middleware('auth')->group(function(){
    Route::get('posts/trashed-post','PostController@trashedPost')->name('posts.trashed');
    Route::delete('posts/force-delete/{post}','PostController@forceDestroy')->name('posts.force-delete');
    Route::patch('users/make-admin/{user}','UserController@makeAdmin')->name('users.make-admin');
    Route::patch('users/remove-admin/{user}','UserController@removeAdmin')->name('users.remove-admin');
    Route::get('settings/active-setting', 'SettingController@getActiveSetting')->name('settings.active');
    Route::resources([
        'categories' => 'CategoriesController',
        'posts' => 'PostController',
        'tags' => 'TagController',
        'users' => 'UserController',
        'settings' => 'SettingController'
    ]);
    Route::put('posts/restore-post/{post}','PostController@restorePost')->name('posts.restore');
});
