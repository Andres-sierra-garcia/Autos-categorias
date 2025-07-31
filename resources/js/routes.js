
import RegistrarAuto from '../views/autos/create.vue';
import indexAutos from '../views/autos/index.vue';
import editarAuto from '../views/autos/edit.vue';

const routes = [
    { path: '/', component: indexAutos },
    { path: '/registrarAuto', component: RegistrarAuto },
    { path: '/editarAuto/:id', component: editarAuto }
];

export default routes;