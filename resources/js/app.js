/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('users-index-component', require('./components/users/index.vue').default);
var indexPostComponent =  Vue.component('post-index-component', require('./components/posts/index.vue').default);
var createPostComponent = Vue.component('post-create-component', require('./components/posts/create.vue').default);
var appPostComponent = Vue.component('post-app-component', require('./components/posts/app.vue').default);

import Vue from 'vue'
import BootstrapVue from 'bootstrap-vue'
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'
import VueRouter from 'vue-router'

Vue.use(VueRouter)
Vue.use(BootstrapVue);

const axios = require('axios');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const routes = [
    { path: '/posts/create', component: createPostComponent},
    { path: '/posts/edit', component: createPostComponent},
    { path: '/posts/index', component: indexPostComponent},
]

const router = new VueRouter({
    routes
})

const app = new Vue({
    router
}).$mount('#app')
