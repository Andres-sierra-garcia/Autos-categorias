
import AboutView from '../views/aboutView.vue';
import RegistrarAuto from '../views/autos/create.vue';
import indexAutos from '../views/autos/index.vue';

const routes = [
    { path: '/', component: indexAutos },
    { path: '/about', component: AboutView },
    { path: '/registrarAuto', component: RegistrarAuto },
];

export default routes;