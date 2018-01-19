<?php

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "admin" middleware group. Now create something great!
|
*/

// Authentication Routes...
$this->get('login', 'Auth\LoginController@showLoginForm')->name('login');
$this->post('login', 'Auth\LoginController@login');
$this->post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
$this->get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
$this->post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
$this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
$this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
$this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
$this->post('password/reset', 'Auth\ResetPasswordController@reset');

Route::middleware(['auth:admin']) // middleware:guard
    ->group(function() {
        Route::get('/', 'AdminController@index');
        Route::get('dashboard', 'AdminController@index');
        Route::get('profile', 'AdminController@profile');

        Route::resource('news', 'NewsController');
        /*
        Verb	    URI	                    Action	    Route Name
        ----        ---                     ------      ----------
        GET	        /news	                index	    news.index
        GET	        /news/create	        create	    news.create
        POST	    /news	                store	    news.store
        GET	        /news/{news}	        show	    news.show
        GET	        /news/{news}/edit	    edit	    news.edit
        PUT/PATCH	/news/{news}	        update	    news.update
        DELETE	    /news/{news}	        destroy	    news.destroy
        */
        Route::resource('media', 'MediaController');
        Route::resource('feedback', 'FeedbackController', ['only' => ['index', 'show', 'destroy']]);
    });
