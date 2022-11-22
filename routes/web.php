<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Auth::routes();

Route::middleware('auth')->namespace('Admin')->name('admin.')->prefix('admin')->group(function(){
    Route::get('/', 'HomeController@index')->name('home');
    Route::resource('posts', 'PostsController');
    Route::resource('users', 'UsersController');
    Route::resource('categories', 'CategoriesController');
});

Route::get('/', function () {
    return view('guestes.home');
})->name('guestHome');

Route::get('{any?}', function () {
    return redirect()->route('guestHome');
})->where('any', '.*');
