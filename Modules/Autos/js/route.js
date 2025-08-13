
import RegistrarAuto from '../resources/views/Autos/create.vue';
import indexAutos from '../resources/views/Autos/index.vue';
import editarAuto from '../resources/views/Autos/edit.vue';
/* import categorias from '../views/categorias/index.vue';
import categoriasEdit from '../views/categorias/edit.vue';
import categoriasCreate from '../views/categorias/create.vue'; */

const routes = [
    { path: '/', component: indexAutos },
    { path: '/registrarAuto', component: RegistrarAuto },
    { path: '/editarAuto/:id', component: editarAuto },
    //categorías
/*     { path: '/categorias', component: categorias },
    { path: '/categorias/editar/:id', component: categoriasEdit },
    { path: '/categorias/crear', component: categoriasCreate }, */
];

export default routes;