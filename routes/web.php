<?php

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
Route::group([
    'middleware' => 'auth.admin:admin'
], function () {
    Route::get('/', 'SystemController@dashboard');
    Route::get('/dashboard', 'SystemController@dashboard');

    Route::resource('/admins', 'AdminController');
    Route::patch('/admins/{id}/restore', 'AdminController@restore');
    Route::resource('/admin-permissions', 'PermissionController');

    Route::resource('/users', 'UserController');
    Route::patch('/users/{id}/restore', 'UserController@restore');

    Route::group([
    ], function() {
        Route::resource('/comments', 'CommentController');
        Route::resource('/posts', 'PostController');
        Route::resource('/posts/tags', 'PostTagController');
        Route::patch('/posts/{id}/restore', 'PostController@restore');
    });
});
