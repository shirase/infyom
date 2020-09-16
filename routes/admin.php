<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin'], function () {
    Route::get('/', function () {
        return view('admin::welcome');
    });

    Route::resource('pages', 'PageController', ["as" => 'admin']);
    Route::resource('articles', 'ArticleController', ["as" => 'admin']);
    Route::resource('article-categories', 'ArticleCategoryController', ["as" => 'admin']);
});
