<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin'], function () {
    Route::get('/', function () {
        return view('admin::welcome');
    });

    Route::get('pages/tree', 'PageController@tree', ["as" => 'admin']);
    Route::get('pages/tree/create', 'PageController@treeCreate', ["as" => 'admin']);
    Route::get('pages/tree/show', 'PageController@treeShow', ["as" => 'admin']);
    Route::get('pages/tree/hide', 'PageController@treeHide', ["as" => 'admin']);
    Route::get('pages/tree/move', 'PageController@treeMove', ["as" => 'admin']);
    Route::get('pages/tree/delete', 'PageController@treeDelete', ["as" => 'admin']);
    Route::get('pages/tree/rename', 'PageController@treeRename', ["as" => 'admin']);
    Route::resource('pages', 'PageController', ["as" => 'admin']);

    Route::resource('articles', 'ArticleController', ["as" => 'admin']);
    Route::resource('article-categories', 'ArticleCategoryController', ["as" => 'admin']);
    Route::patch('article-categories', 'ArticleCategoryController@index', ["as" => 'admin']);
    Route::resource('users', 'UserController', ["as" => 'admin']);
});
