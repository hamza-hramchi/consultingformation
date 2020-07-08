require('./bootstrap');

/*--------------------------------------------------------------------------*/

import { Form, HasError, AlertError } from 'vform'
import VueRouter from 'vue-router'
import VueProgressBar from 'vue-progressbar'
import Swal from 'sweetalert2'
import VueCtkDateTimePicker from 'vue-ctk-date-time-picker';
import 'vue-ctk-date-time-picker/dist/vue-ctk-date-time-picker.css';

/*--------------------------------------------------------------------------*/

window.Vue = require('vue');
window.Swal = Swal;
window.Form = Form;

/*--------------------------------------------------------------------------*/

Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)
Vue.component('VueCtkDateTimePicker', VueCtkDateTimePicker);

/*--------------------------------------------------------------------------*/

Vue.use(VueRouter);
Vue.use(VueProgressBar, {
  color: 'rgb(143, 255, 199)',
  failedColor: 'red',
  height: '6px'
})

/*--------------------------------------------------------------------------*/

//Toast for SweetAlert2
 const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    onOpen: (toast) => {
      toast.addEventListener('mouseenter', Swal.stopTimer)
      toast.addEventListener('mouseleave', Swal.resumeTimer)
      }
})
window.Toast = Toast;

/*--------------------------------------------------------------------------*/

// Routes
let routes = [
  { path: '/', component: require('./components/Home.vue').default },
  { path: '/services', component: require('./components/Services.vue').default },
  { path: '/references', component: require('./components/References.vue').default },
  { path: '/contact', component: require('./components/Contact.vue').default },
  { path: '/rendezvous', component: require('./components/RendezVous.vue').default },
]

/*--------------------------------------------------------------------------*/

// Router
const router = new VueRouter({
    mode : 'history',
    routes  //raccourci pour `routes: routes`
})

/*--------------------------------------------------------------------------*/

const app = new Vue({
  el: '#app',
  router
});

/*--------------------------------------------------------------------------*/
