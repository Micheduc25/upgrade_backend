require('./bootstrap');

window.Vue = require('vue');

import Login from "./components/login.vue";

// Vue.component(
//     'hello',
//     require('./components/hello.vue')
// );

new Vue({
    el: '#app',
    components: {
        Login,
    }
});