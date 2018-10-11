/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import VueRouter from 'vue-router';

window.Vue.use(VueRouter);

import PlacesIndex from './components/PlacesIndex.vue';
import PlacesCreate from './components/PlacesCreate.vue';

const routes = [
    {path: '/', component: PlacesIndex, name: 'PlacesIndex' },
    {path: '/places/create', component: PlacesCreate, name: 'PlacesCreate'},
]

const router = new VueRouter({routes})

const app = new Vue({router}).$mount('#app')