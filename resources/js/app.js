
require('./bootstrap');
//vue.js
window.Vue = require('vue').default;
import Vue from 'vue';

// v form
import Form from 'vform'
window.Form = Form;


//vue router
import VueRouter from 'vue-router'
Vue.use(VueRouter);

//filter
import {filter} from "./filter/filter"


//toastr
import toastr from 'toastr'
window.toastr = toastr;

// //Sweet alert2
// import Swal from 'sweetalert2'
// window.Form = Swal;

// const Toast = Swal.mixin({
//     toast: true,
//     position: 'top-end',
//     showConfirmButton: false,
//     timer: 3000,
//     timerProgressBar: true,
//     didOpen: (toast) => {
//       toast.addEventListener('mouseenter', Swal.stopTimer)
//       toast.addEventListener('mouseleave', Swal.resumeTimer)
//     }
//   });
//   window.Form = Toast;



//Routes
import { routes } from './routes/routes.js';
import { Toast } from 'bootstrap';

//Vuex
import Vuex from 'vuex'
Vue.use(Vuex)
import { createApp } from 'vue'
import { createStore } from 'vuex'
import storeData from './store/store.js';
// Create a new store instance.
const store = new Vuex.Store(
   storeData
);



  const router = new VueRouter({
    routes,
    //mode: 'history',
  });


    Vue.component('example-component', require('./components/ExampleComponent.vue').default);
    Vue.component('admin-home', require('./components/backend/home.vue').default);


const app = new Vue({
    el: '#content',
    router,
    store
});



