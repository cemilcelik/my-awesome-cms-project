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

Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/about-us', 'ContentController@index');
Route::get('/news', 'NewsController@index');
Route::get('/contact', 'ContactController@index');

// Member Routes
Auth::routes();
// // Authentication Routes...
// $this->get('login', 'Auth\LoginController@showLoginForm')->name('login');
// $this->post('login', 'Auth\LoginController@login');
// $this->post('logout', 'Auth\LoginController@logout')->name('logout');
// // Registration Routes...
// $this->get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
// $this->post('register', 'Auth\RegisterController@register');
// // Password Reset Routes...
// $this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
// $this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
// $this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
// $this->post('password/reset', 'Auth\ResetPasswordController@reset');

// Admin Routes
Route::get('admin', 'Admin\AdminController@index');
Route::get('admin/login', 'Admin\AuthController@login');
Route::get('admin/logout', 'Admin\AuthController@logout');
Route::get('admin/register', 'Admin\AuthController@showRegisterForm');
Route::post('admin/register', 'Admin\AuthController@register');
Route::post('admin/login', 'Admin\AuthController@authenticate');
Route::group(
    ['middleware' => ['auth:admin']], 
    function () {
	    Route::get('admin/dashboard', 'Admin\AdminController@index');
        Route::get('admin/profile', 'Admin\AdminController@profile');
        Route::get('admin/news', 'Admin\NewsController@index');
    }
);