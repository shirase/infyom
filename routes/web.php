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

Route::get('/test', 'TestController@test');

Route::get('/articles/{slug}', 'ArticleController@show')->name('article.show');

Route::get('/{slug}', 'PageController@show')
    ->name('page.show')
    ->where('slug', '.*')
;

//Route::page(); // URI like `/{slug}`
