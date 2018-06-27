
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');


import Vue from 'vue';
import Vuex from 'vuex';


Vue.use(Vuex);

var VueCookie = require('vue-cookie');
Vue.use(VueCookie);

import VueSocketio from 'vue-socket.io';
var client = require('socket.io-client');
var socketServer = 'http://' + document.location.hostname + ':6001';


Vue.use(VueSocketio, client(socketServer));


import axios from 'axios';
import VueAxios from 'vue-axios';


Vue.use(VueAxios, axios);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('block_games', require('./components/block_games.vue'));
Vue.component('block_create_game', require('./components/block_create_game.vue'));
Vue.component('login', require('./components/login.vue'));
Vue.component('room_game', require('./components/room_game.vue'));
Vue.component('nav_bar_room', require('./components/nav_bar_room.vue'));
Vue.component('block_money', require('./components/block_money.vue'));
Vue.component('transaction', require('./components/transaction.vue'));





const app = new Vue({
    el: '#app'
});
