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

Route::get(trans('routes.home'), ['as' => 'home', 'uses' => 'HomeController@index']);
Route::get(trans('routes.about'), ['as' => 'about', 'uses' => 'ContentController@index']);
Route::get(trans('routes.news'), ['as' => 'news', 'uses' => 'NewsController@index']);
Route::get(trans('routes.news').'/{id}/{slug}', ['as' => 'news.show', 'uses' => 'NewsController@show']);
Route::get(trans('contact'), ['as' => 'contact', 'uses' => 'ContactController@index']);

Route::post('contact-form/send', 'FeedbackController@sendContactMessage')->name('contact-form-send');
// Mail Test
Route::get('show-contact-message-mail', function() {
    $feedback = \App\Feedback::find(1);
    return new \App\Mail\ContactMessageSended($feedback);
});

Route::get('lang/{language}', ['as' => 'lang.switch', 'uses' => 'LanguageController@switchLang']);

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

Route::get('city', 'CityController@index')->name('city.index');
Route::get('town', 'TownController@index')->name('town.index');
