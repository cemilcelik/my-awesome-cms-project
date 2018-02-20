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
Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localize', 'localizationRedirect', 'localeSessionRedirect', 'localeViewPath']
], function() {
    Route::get('/', 'HomeController@index');
    Route::get(LaravelLocalization::transRoute('routes.home'), ['as' => 'home', 'uses' => 'HomeController@index']);
    Route::get(LaravelLocalization::transRoute('routes.about'), ['as' => 'about', 'uses' => 'ContentController@index']);
    Route::get(LaravelLocalization::transRoute('routes.news'), ['as' => 'news', 'uses' => 'NewsController@index']);
    Route::get(LaravelLocalization::transRoute('routes.news_detail'), ['as' => 'news.show', 'uses' => 'NewsController@show']);
    Route::get(LaravelLocalization::transRoute('routes.contact'), ['as' => 'contact', 'uses' => 'ContactController@index']);
    Auth::routes();
    /*  Auth Routes 
        $this->get('login', 'Auth\LoginController@showLoginForm')->name('login');
        $this->post('login', 'Auth\LoginController@login');
        $this->post('logout', 'Auth\LoginController@logout')->name('logout');
        $this->get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
        $this->post('register', 'Auth\RegisterController@register');
        $this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
        $this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
        $this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
        $this->post('password/reset', 'Auth\ResetPasswordController@reset');
    */
});

Route::post('contact-form/send', 'FeedbackController@sendContactMessage')->name('contact-form-send');
// Mail Test
Route::get('show-contact-message-mail', function() {
    $feedback = \App\Feedback::find(1);
    return new \App\Mail\ContactMessageSended($feedback);
});

Route::get('city', 'CityController@index')->name('city.index');
Route::get('town', 'TownController@index')->name('town.index');
