<?php

use Illuminate\Routing\Route as RoutingRoute;
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


Auth::routes();


Route::middleware(['auth', 'role:admin'])->prefix('/admin')->group(function () {
    // User is authentication and has admin role
    Route::get('/', 'HomeController@index')->name('dashboard');

    Route::get('/categories', 'CategoryController@index')->name('categories');
    Route::post('/add/category', 'CategoryController@store')->name('category.store');

    Route::get('/posts', 'PostController@index')->name('posts');
    Route::get('/posts/create', 'PostController@create')->name('posts.create');
    Route::post('/posts/store', 'PostController@store')->name('posts.store');
    Route::get('/posts/edit/{post_id}', 'PostController@edit')->name('posts.edit');
    Route::post('/posts/update/{id}', 'PostController@update')->name('posts.update');
    Route::get('/posts/{slug}/view', 'PostController@show')->name('posts.show');
    Route::get('/posts/{id}/destroy', 'PostController@destroy')->name('posts.delete');

    // Route::get('/', 'HomeController@index')->name('home');



});

// front pages
    Route::get('/', 'HomeController@index')->name('index');

    Route::get('/posts/{slug}', 'HomeController@single')->name('single.post');

    Route::post('/comment/{post}', 'HomeController@comment')->name('comment.store');
