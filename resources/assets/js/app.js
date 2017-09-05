
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

require('popper.js');

require('jquery-form-validator');

$(function() {

    console.log("JQuery loaded...");

    $('.b-tooltip').tooltip();

    // Add custom validation rule
    $.formUtils.addValidator({
        name : 'datetime',
        validatorFunction : function(value, $el, config, language, $form) {
            var validTime = value.match(/^\d\d\d\d-(0?[1-9]|1[0-2])-(0?[1-9]|[12][0-9]|3[01]) (00|[0-9]|1[0-9]|2[0-3]):([0-9]|[0-5][0-9]):([0-9]|[0-5][0-9])$/);
            if ( ! validTime) {
               return false;
            } else {
               return true;
            }
        },
        errorMessage : 'Invalid datetime.',
        errorMessageKey: 'badDatetime'
    });
    
    $.validate();
    
});
