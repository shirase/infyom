<?php

use Illuminate\Support\Facades\Route;

Auth::routes(['verify' => true]);

Route::get('/', function () {
    return view('admin::welcome');
});

Route::group(['prefix' => 'admin'], function () {
    Route::resource('pages', 'PageController', ["as" => 'admin']);
});
