require('./bootstrap');

/*--------------------------------------------------------------------------*/

import { Form, HasError, AlertError } from 'vform'
import VueRouter from 'vue-router'
import VueProgressBar from 'vue-progressbar'
import Swal from 'sweetalert2'
import Vue from 'vue'
import jsPDF from 'jspdf'
import Loading from 'vue-loading-overlay';
import 'vue-loading-overlay/dist/vue-loading.css';

/*--------------------------------------------------------------------------*/

window.Vue = require('vue');
window.Swal = Swal;
window.Form = Form;

/*--------------------------------------------------------------------------*/
Vue.use(Loading);
Vue.use(jsPDF);
Vue.use(VueRouter);
Vue.use(VueProgressBar, {
  color: 'green',
  failedColor: 'red',
  height: '5px'
})

/*--------------------------------------------------------------------------*/

Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)


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

  // Any routes
  {path: '*', component: require('./components/GlobalComponents/NotFound.vue').default},

  // Routes for Main Components
  { path: '/', component: require('./components/MainComponents/Home.vue').default, name : 'accueil' },
  { path: '/contacts', component: require('./components/MainComponents/Contact.vue').default, name : 'contacts' },
  { path: '/rendezvous', component: require('./components/MainComponents/Appointment.vue').default, name : 'rendezvous' },
  { path : '/methodologie', component: require('./components/MainComponents/Methodology.vue').default, name : 'methodologie' },

  // Routes for Service Componenets
  { path : '/transformationdigitale', component: require('./components/ServiceComponents/DigitalTransformation.vue').default, name : 'transformationdigitale' },
  { path : '/iotformation', component: require('./components/ServiceComponents/IOTFormation.vue').default, name : 'iotformation' },

  // Routes for Dashboard Components
  { path: '/dashboard', component: require('./components/Dashboard/AppointmentDashboard.vue').default},
  { path: '/dashboard/contacts', component: require('./components/Dashboard/ContactDashboard.vue').default},

]

/*--------------------------------------------------------------------------*/

// Router
const router = new VueRouter({
    mode : 'history',
    routes , //raccourci pour `routes: routes`
    scrollBehavior (to, from, savedPosition) {
      if (savedPosition) {
        return savedPosition
      } else {
        return { x: -4, y: -4 }
      }
    }
})

/*--------------------------------------------------------------------------*/

const app = new Vue({
  el: '#app',
  router,
});

/*--------------------------------------------------------------------------*/
export default router;

router.beforeEach((to, from, next) => {
    // Redirect if fullPath begins with a hash (ignore hashes later in path)
    if (to.fullPath.substr(0,2) === "/#") {
        const path = to.fullPath.substr(2);
        next(path);
        return;
    }
    next();
});
