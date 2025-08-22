import './bootstrap'; 
import Vue from 'vue';
import VueRouter from 'vue-router';

import autosModuleRoutes from '../../Modules/Autos/js/route.js';
import categoriasModuleRoutes from '../../Modules/Categorias/js/route.js';

Vue.prototype.$axios = window.axios; 
Vue.use(VueRouter);


const routes = [
    ...autosModuleRoutes.options.routes,
    ...categoriasModuleRoutes.options.routes
]

const router = new VueRouter({
    mode: 'history',
    routes
})

const app = new Vue({
    router,      
}).$mount('#app');







