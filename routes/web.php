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

Auth::routes();

Route::get('blog','BlogsController@index')->name('blog');
Route::get('blog/create','BlogsController@create')->name('blogs.create');
Route::post('blog/create','BlogsController@store')->name('blog.store');

Route::get('blog/trash','BlogsController@trash')->name('blogs.trash');
Route::get('blog/trash/{id}/restore','BlogsController@restore')->name('blogs.restore');

Route::get('blog/{id}','BlogsController@show')->name('blogs.show');
Route::get('blog/{id}/edit','BlogsController@edit')->name('blogs.edit');
Route::patch('blog/{id}/edit','BlogsController@update')->name('blogs.update');
Route::post('blog/{id}/delete','BlogsController@delete')->name('blogs.delete');


Route::get('/home', 'HomeController@index')->name('home');

Route::get('admin','AdminController@index')->name('admin.index');

Route::resource('categories','CategoryController');
