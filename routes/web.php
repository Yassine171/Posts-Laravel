<?php

use App\Http\Controllers\HomeController;
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
Route::get('/','HomeController@index')->name('home');
Route::get('/hello','HomeController@index');
// Route::get('/show/{slug}','HomeController@show')->name('post.show');
// Route::get('/post/create','HomeController@create')->name('post.create');
// Route::post('/post/add','HomeController@store')->name('post.store');
// Route::get('/post/edit/{slug}','HomeController@edit')->name('post.edit');
// Route::put('/post/update/{slug}','HomeController@update')->name('post.update');
Route::DELETE('/post/delete/{slug}','PostController@delete')->name('post.delete');
Route::get('/post/restore/{slug}','PostController@restore')->name('post.restore');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return redirect('/');
});
Route::resource('post','PostController');

