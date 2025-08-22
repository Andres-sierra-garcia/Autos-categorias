import Vue from 'vue';
import VueRouter from 'vue-router';
import index from "../resources/views/index.vue";
import create from "../resources/views/create.vue";
import edit from "../resources/views/edit.vue";

Vue.use(VueRouter);

const routes = [
    { path: '/Categorias', component: index },
    { path: '/CategoriaCreate', component: create },
    { path: '/CategoriaEdit/:id', component: edit }
]

const router = new VueRouter({
    mode: 'history',
    routes
});

export default router;