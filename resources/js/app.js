require('./bootstrap');
import vue from 'vue'
window.Vue = vue;

import App from './components/WelcomePage.vue';
import MainHeader from './components/MainHeader.vue';
import VueRouter from 'vue-router';
import VueAxios from 'vue-axios';
import axios from 'axios';
import {routes} from './routes';
 
Vue.use(VueRouter);
Vue.use(VueAxios, axios);
 
// Add components.
Vue.component('main-header', MainHeader);

const router = new VueRouter({
    mode: 'history',
    routes: routes
});
 
const app = new Vue({
    el: '#app',
    router: router
});
