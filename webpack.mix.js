let mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.extract(['jquery', 'bootstrap-sass', 'lodash', 'axios', 'vue'])
    .autoload({
        jquery: ['$', 'window.jQuery', 'jQuery', 'jquery'], // solution : 'bootstrap-sass' error : "bootstrap's JavaScript requires jQuery"
    })
    .js('resources/assets/js/admin/app.js', 'public/js/admin')
    .sass('resources/assets/sass/admin/app.scss', 'public/css/admin')
    .js('resources/assets/js/app.js', 'public/js')
    .sass('resources/assets/sass/app.scss', 'public/css');