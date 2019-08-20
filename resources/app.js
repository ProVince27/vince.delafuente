require('./bootstrap');

window.Vue = require('vue')

import * as Components from './shared/vue/components/index-components'
Object.keys(Components)
   .forEach(key => Vue.component(Components[key].name, Components[key]))

import './app/dashboard/dashboard'

import './app/dev/google-service'

// initialize parent component
const app = new Vue({
}).$mount('#app');
