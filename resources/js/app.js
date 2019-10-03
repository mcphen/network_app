/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import VueSweetalert2 from 'vue-sweetalert2';
 
// If you don't need the styles, do not connect
import 'sweetalert2/dist/sweetalert2.min.css';
 
Vue.use(VueSweetalert2);

Vue.use(require('vue-resource'));
Vue.use(require('vue-moment'));

import skeleton from 'tb-skeleton'
import  'tb-skeleton/dist/skeleton.css'
Vue.use(skeleton)

import 'vuejs-noty/dist/vuejs-noty.css'
import VueNoty from 'vuejs-noty'



Vue.use(VueNoty)

var infiniteScroll =  require('vue-infinite-scroll');
Vue.use(infiniteScroll)

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

//Vue.component('example-component', require('./components/ExampleComponent.vue').default);


Vue.component('InfiniteLoading', require('vue-infinite-loading'));

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
import posts from './components/Posts'
import chatcomponent from './components/ChatApp'
import postfeed from './components/PostFeed'
import friend from './components/Friend'
import unread from './components/UnreadNots'
import notification from './components/Notification'
//import like from './components/Like'
import init from './components/Init'
import network from './components/Network'
import networkfollow from './components/NetworkFollow'
import { store } from './store'
const app = new Vue({
    el: '#app',
    components: { networkfollow, network, init, friend, posts, chatcomponent, postfeed, notification, unread },
    store : store,

});
