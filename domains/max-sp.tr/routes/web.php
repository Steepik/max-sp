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

Route::get('/', 'IndexController@index');

Auth::routes();

Route::get('projects', 'IndexController@show')->name('projects');
Route::get('pages/{page}', 'PageController@index')->name('pages');
Route::get('del/{c}', 'PageController@del');

Route::group(['prefix' => 'profile', 'middleware' => 'auth'], function() {
    Route::get('/', 'ProfileController@index')->name('profile');
    Route::get('download/{projectId}', 'ProfileController@download')->name('download');
    Route::post('sendReview', 'ProfileController@sendReview')->name('send-review');
});

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function () {
    Route::get('/', 'Admin\UserController@index')->name('admin-panel');
    Route::get('add-project-to-user/user/{user_id}', 'Admin\UserController@showProjectForm')->name('add-project-to-user');
    Route::post('add-project-to-user/save/{user_id}', 'Admin\UserController@saveProject')->name('save-project-to-user');
    Route::get('add-user', 'Admin\UserController@addUserShow')->name('add-user-view');
    Route::post('add-user', 'Admin\UserController@addUser')->name('save-user');
    Route::get('add-project', 'Admin\ProjectController@index')->name('add-project-admin-view');
    Route::post('add-project', 'Admin\ProjectController@saveProject')->name('add-project-admin');
    Route::post('delete-user/{id}', 'Admin\UserController@delete')->name('delete-user');
});