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

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\AdminLoginController;

Route::namespace('Frontend')->group(function(){
    Route::get('/', 'FrontendController@welcome')->name('welcome');
    Route::get('/blog', 'FrontendController@blog')->name('blog');
});

Auth::routes();

Route::namespace('Auth')->group(function () {
    Route::get('/profile', 'UserController@profile')->name('profile');
    Route::delete('/profile', 'UserController@destroy')->name('destroy');
});

Route::prefix('admin')->group(function(){
    Route::get('/', 'AdminController@index')->name('admin.dashboard');
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
    Route::get('/register', 'Auth\AdminLoginController@register')->name('admin.register');
});

Route::resource('posts', 'PostController');



Route::get('admin', 'AdminController@index')->name('admin.dashboard');

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/test', 'TestController')->name('test');

// Route::redirect('/here', 'https://www.google.com.pk', 301);
