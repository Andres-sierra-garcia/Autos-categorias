
import RegistrarAuto from '../views/autos/create.vue';
import indexAutos from '../views/autos/index.vue';
import editarAuto from '../views/autos/edit.vue';
import categorias from '../views/categorias/index.vue';
import categoriasEdit from '../views/categorias/edit.vue';
import categoriasCreate from '../views/categorias/create.vue';

const routes = [
    { path: '/', component: indexAutos },
    { path: '/registrarAuto', component: RegistrarAuto },
    { path: '/editarAuto/:id', component: editarAuto },
    //categorías
    { path: '/categorias', component: categorias },
    { path: '/categorias/editar/:id', component: categoriasEdit },
    { path: '/categorias/crear', component: categoriasCreate },
];

export default routes;