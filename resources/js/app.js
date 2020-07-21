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

Vue.use(VueRouter);
Vue.use(VueProgressBar, {
  color: 'green',
  failedColor: 'red',
  height: '5px'
})

/*--------------------------------------------------------------------------*/

Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)
Vue.component('VueCtkDateTimePicker', VueCtkDateTimePicker);

/*--------------------------------------------------------------------------*/

//Toast for SweetAlert2
 const Toast = Swal.mixin({
    toast: true,
    position: 'center',
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
  { path: '/', component: require('./components/MainComponents/Home.vue').default, name : 'accueil' },
  { path: '/contact', component: require('./components/MainComponents/Contact.vue').default, name : 'contact' },
  { path: '/rendezvous', component: require('./components/MainComponents/Appointment.vue').default, name : 'rendezvous' },
  { path : '/methodologie', component: require('./components/MainComponents/Methodology.vue').default, name : 'methodologie' },

  { path : '/transformationdigitale', component: require('./components/ServiceComponents/DigitalTransformation.vue').default, name : 'transformationdigitale' },
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
