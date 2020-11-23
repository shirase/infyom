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

Route::get('/articles/{slug}', 'ArticleController@show')->name('article.show');

Route::get('/article-categories/{slug}', 'ArticleController@index')->name('article.index');

Route::page(); // URI like `/{slug}`
