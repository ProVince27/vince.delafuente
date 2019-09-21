require('./bootstrap');

// window.Vue = require('vue')
// window.Vuex = require('vuex')
import Vue from 'vue'
import Vuex from 'vuex'
import store from 'store'

import FileManager from 'laravel-file-manager'

Vue.use(Vuex);

Vue.use(FileManager, {store});

import './app/dashboard/dashboard'

import './app/dev/google-service'

import './app/media/media'

// initialize parent component
const app = new Vue({
    store
}).$mount('#app');
