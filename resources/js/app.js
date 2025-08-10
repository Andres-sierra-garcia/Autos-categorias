import './bootstrap'; 

import 'bootstrap';
import Vue from 'vue';
import VueRouter from 'vue-router';
import routes from './routes';
Vue.prototype.$axios = window.axios; 


Vue.use(VueRouter);

const router = new VueRouter({
    mode: 'history', 
    routes            
});

const app = new Vue({
    el: '#app', 
    router,      
});





