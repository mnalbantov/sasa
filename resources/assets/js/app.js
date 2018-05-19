
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

// require('./custom');
// require('./map');
// require('./price-range');
require('./validation');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
import Vue from 'vue';
import VeeValidate, {Validator} from 'vee-validate';
import bg from 'vee-validate/dist/locale/bg';
Validator.localize('bg',bg)
Vue.use(VeeValidate);

Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('ad', require('./components/Ad.vue'));
Vue.component('auto-complete', require('./components/Autocomplete.vue'));
Vue.component('profile-section', require('./components/ProfileSection.vue'));
Vue.component('post-ad', require('./components/Post-Ad.vue'));
// Vue.component('roommates', require('./components/Roommates.vue'));

var app = new Vue({
    el: '#app',
    data: {
        message: ''
    }
});


