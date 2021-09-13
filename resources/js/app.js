/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import VueRouter from 'vue-router';
Vue.use(VueRouter);

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))
import App from "./components/App.vue";


import HomeComponent from "./components/HomeComponent.vue";
import RestaurantComponent from "./components/RestaurantComponent.vue";
import CartComponent from "./components/CartComponent.vue";
// Vue.component('home-component', require('./components/HomeComponent.vue').default);
// Vue.component('restaurant-component', require('./components/RestaurantComponent.vue').default);


Vue.component('cart-component', require('./components/CartComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            component: HomeComponent,
            name: 'restaurants',
        },
        {
            path: '/restaurants/:id',
            component: RestaurantComponent,
            name: 'restaurants.show',
        },
    ]
})

const app = new Vue({
    el: '#app',
    components: { App },
    router,
});
