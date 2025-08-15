
import RegistrarAuto from '../resources/views/Autos/create.vue';
import indexAutos from '../resources/views/Autos/index.vue';
import editarAuto from '../resources/views/Autos/edit.vue';

    export default [
    { path: '/', component: indexAutos },
    { path: '/registrarAuto', component: RegistrarAuto },
    { path: '/editarAuto/:id', component: editarAuto },
];
