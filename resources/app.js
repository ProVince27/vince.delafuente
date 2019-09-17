require('./bootstrap');

// window.Vue = require('vue')
// window.Vuex = require('vuex')
// import Vuex from 'vuex'
import Vue from 'vue'
import Vuex from 'vuex'

import * as Components from './shared/vue/components/index-components'

import FileManager from 'laravel-file-manager'

Vue.use(Vuex)

const store = new Vuex.Store();


Object.keys(Components)
   .forEach(key => Vue.component(Components[key].name, Components[key]))

// console.log(store)

Vue.use(FileManager,{store})


// import './app/dashboard/dashboard'

// import './app/dev/google-service'

import './app/media/media'

// initialize parent component
const app = new Vue({
}).$mount('#app');
