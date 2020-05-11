
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import VueRouter from 'vue-router'

Vue.use(VueRouter)
import signup from "./components/signup.vue";
import examplevue from "./components/ExampleComponent.vue";
import login from "./components/login.vue";
import todo from "./components/Todo.vue";
import mynav from "./components/mynav.vue";
import about from "./components/about.vue";


//support vuex
import Vuex from 'vuex'
Vue.use(Vuex)
import storeData from "./store/index"

const store = new Vuex.Store(
   storeData
)

const routes = [
    {
        path: "/",
        components: {
            signup,
            examplevue,
            mynav
        }
    },
    {
        path: "/login",
        components: {
            login,
            examplevue,
            mynav
        }
    },

    {
        path: "/about",
        components: {
            about,
            mynav
        }
    },

    {
        path: "/todo",
        components: {
            todo,
            examplevue,
            mynav
        },
        params: {
            data: store.state
        }
    }
];

const router = new VueRouter({
    mode: "history",
    routes: routes
});

import { Store } from 'vuex' 
import createPersistedState from 'vuex-persistedstate' 
import * as Cookies from 'js-cookie' 
const store1 = new Store({ 
    // ... 
    plugins: [ 
        createPersistedState({ 
            getState: (key) => Cookies.getJSON(key), 
            setState: (key, state) => Cookies.set(key, state, { expires: 3, secure: true }) 
        }) 
    ] 
})

//Source: https://prograide.com/pregunta/42740/vuex-etat-sur-lactualisation-de-la-page


/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('sign-up', require('./components/signup.vue').default);
Vue.component('log-in', require('./components/login.vue').default);
Vue.component('to-do', require('./components/Todo.vue').default);
Vue.component('my-nav', require('./components/mynav.vue').default);
Vue.component('about', require('./components/about.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: "#app",
    router,
    store, //vuex
    store1
});
