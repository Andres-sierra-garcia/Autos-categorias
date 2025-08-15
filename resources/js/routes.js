import Vue from "vue";
import VueRouter from "vue-router";

Vue.use(VueRouter);

import rutasAutos from '../../Modules/Autos/js/route.js';

const routes = [
    ...rutasAutos
];

const router = new VueRouter({
    mode: 'history',
    routes
})

export default router;
