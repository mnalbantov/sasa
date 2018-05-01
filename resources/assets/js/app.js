
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

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('ad', require('./components/Ad.vue'));
Vue.component('auto-complete', require('./components/Autocomplete.vue'));
Vue.component('profile-section', require('./components/ProfileSection.vue'));


const app = new Vue({
    el: '#app',
    data: {
        message: 'Hello Vue JS'
    }
});
