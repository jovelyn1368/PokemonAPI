//import vue
import Vue from 'vue';
import App from './Poke.vue'
import { BootstrapVue, IconsPlugin } from 'bootstrap-vue'

// Import Bootstrap an BootstrapVue CSS files (order is important)
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'

//register component
Vue.component('login-component',require('./components/LoginDashboard.vue').default);
Vue.component('nav-component',require('./components/Navbar.vue').default);
Vue.component('pokemon-component',require('./components/Pokemon.vue').default);

// Make BootstrapVue available throughout your project
Vue.use(BootstrapVue)
// Optionally install the BootstrapVue icon components plugin
Vue.use(IconsPlugin)

//initialize vue
new Vue({
    el: '#app', 
});
 var app2 = new Vue({
     el: '#app-2',
   })
// new Vue({
//     render: h => h(App),
//   }).$mount('#app')

