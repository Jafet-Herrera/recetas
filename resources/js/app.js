/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue').default;
//* importaiones de sweetAler2
//import VueSweetalert2 from 'vue-sweetalert2';
//import 'sweetalert2/dist/sweetalert2.min.css';

//* importaciones axios
window.axios = require('axios');//Si no agregas puede surgir error 404(No envia a los controllers)


/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))


//* llamada a sweetAlert2
Vue.use(VueSweetalert2);

//* Ignorando elementos de trix-editor para mitigar errores.
Vue.config.ignoredElements = ['trix-editor', 'trix-toolbar'];

//* Anadiendo componente de fecha en apopyo de moment Js
//TODO: Ver vídeo correspondiente a esta sección e incorporar.
//Vue.component('fecha-receta', require('./components/FechaReceta.vue').default);

//* Componen el cual elimina una receta(Emplea sweetAlet2).
Vue.component('eliminar-receta', require('./components/eliminar_receta.vue').default);

//* Btn animado del like(match) a una receta
Vue.component('like-button', require('./components/like-btn.vue').default);


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
