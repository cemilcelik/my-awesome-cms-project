
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// Vue.component('example', require('./components/Example.vue'));

// const app = new Vue({
//     el: '#app'
// });

require('jquery-validation');

require('jquery-mask-plugin');

window.tippy = require('tippy.js');

$(function() {

    console.log("JQuery loaded...");

    $('#form').validate({
        rules: {
            datetime: {
                required: true,
                date: true
            }
        }
    });

    $('.datetime').mask('0000-00-00 00:00:00', { placeholder: "____-__-__ __:__:__" });

    tippy('.b-tooltip');
    
});

