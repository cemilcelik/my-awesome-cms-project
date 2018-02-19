
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

Vue.component('example', require('./components/Example.vue'));
Vue.component('cities', require('./components/Cities.vue'));
Vue.component('towns', require('./components/Towns.vue'));

const app = new Vue({
    el: '#app'
});

require('jquery-validation');

require('jquery-mask-plugin');

window.tippy = require('tippy.js');

window.Quill = require('quill');

require('simplelightbox');

$(function() {

    // console.log("JQuery loaded...");
    
    $('#form').validate({
        rules: {
            datetime: {
                required: true,
                date: true
            }
        }
    });

    $('.datetime').mask('0000-00-00 00:00:00', { placeholder: "____-__-__ __:__:__" });

    if ($('#description-1').length > 0) {
        var quill1 = new Quill("#description-1", {
            theme: 'snow'
        });
    }

    if ($('#description-2').length > 0) {
        var quill2 = new Quill("#description-2", {
            theme: 'snow'
        });
    }

    $('.simplelightbox a').simpleLightbox({});

    tippy('.b-tooltip');

});

