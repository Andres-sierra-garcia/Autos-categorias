import './bootstrap'; 
import Vue from 'vue';
import router from './routes.js';
Vue.prototype.$axios = window.axios; 

const app = new Vue({
    el: '#app', 
    router,      
});





