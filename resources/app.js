require('./bootstrap');

import Vue from 'vue'
import Vuex from 'vuex'
import store from 'store'

import FileManager from 'laravel-file-manager'

Vue.use(Vuex);

Vue.use(FileManager, {store});

/* global components */
import * as contents from 'components/containers'
import * as buttons from 'components/button'
import * as headings from 'components/headings'
const globalComponent = {
    ...contents,
    ...buttons,
    ...headings
}
// load all global components
Object.keys(globalComponent)
   .forEach(key => Vue.component(globalComponent[key].name, globalComponent[key]))


import './app/dashboard/dashboard'

import './app/dev/google-service'

import './app/media/media'

// initialize parent component
const app = new Vue({
    store
}).$mount('#app');
