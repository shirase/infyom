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

Auth::routes(['verify' => true]);

Route::get('/glide/{path}', 'GlideController@show')->where('path', '.*');

Route::get('/articles/{category}', 'ArticleController@show')->name('article.index');
Route::get('/articles/{slug}', 'ArticleController@show')->name('article.show');
Route::get('/articles/{category}/{slug}', 'ArticleController@show')->name('article.category.show');

Route::get('/{slug}', 'PageController@show')
    ->name('page.show')
    ->where('slug', '.*')
;

Route::post('/pages/store/{id}', 'PageController@store')->name('pages.store')->middleware('auth');
