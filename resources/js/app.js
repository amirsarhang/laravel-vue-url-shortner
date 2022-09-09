// Require Vue
require('./bootstrap.js')
import * as bootstrap from 'bootstrap-vue'
Vue.use(bootstrap)
import router from './router.js'
import Vue from 'vue';
window.Vue = Vue;

// Register Vue Components
Vue.component('app', require('./components/App.vue').default);

// Initialize Vue
const app = new Vue({
    el: '#app',
    router,
});
