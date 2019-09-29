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

Route::get('/', 'MessageController@index')->name('index');
Route::get('/message/{id}/delete', 'Admin\IndexController@deleteMessage')->where(['id' => '[0-9]+'])->name('delete');
Route::post('/message/store', 'MessageController@store')->name('store');
Route::get('/profile', 'ProfileController@index')->name('profile.index');


Route::prefix('admin')->middleware('auth')->group(function(){
   Route::get('/', 'Admin\IndexController@index')->name('admin.index');
   Route::post('/message/{id}/answer', 'Admin\IndexController@answer')->name('admin.answer');
});


Auth::routes();

