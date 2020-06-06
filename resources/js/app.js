/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
// var vuelidate = require('vuelidate');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

import swal from 'sweetalert';
import Vuelidate from "vuelidate";
import ExampleComponent from "./components/ExampleComponent.vue";
import Employees from "./components/Employees.vue";
import RowComponent from "./components/RowComponent.vue";
import EditEmployee from "./components/EditEmployee.vue";
import CreateEmployee from "./components/CreateEmployee.vue";
import EmployeeForm from "./components/EmployeeForm.vue";

Vue.component('example-component', ExampleComponent);
Vue.component('employees', Employees);
Vue.component('row', RowComponent);
Vue.component('edit-employee', EditEmployee);
Vue.component('create-employee', CreateEmployee);
Vue.component('form', EmployeeForm);

Vue.use(Vuelidate);

const app = new Vue({
    el: '#app',
});
