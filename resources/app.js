require('./bootstrap');

window.Vue = require('vue')
import * as VueGoogleMaps from 'vue2-google-maps'

import * as Components from './shared/vue/components/index-components'

Object.keys(Components)
   .forEach(key => Vue.component(Components[key].name, Components[key]))


import './app/dashboard/dashboard'

import './app/dev/google-service'

// console.log('proce',process.env.MIX_GOOGLE_MAP_API_KEY)

// Vue.use(VueGoogleMaps, {
//     load: {
//         key:process.env.MIX_GOOGLE_MAP_API_KEY,
//         libraries:'places'
//     },
//     installComponents:false
// })

// initialize parent component
const app = new Vue({
}).$mount('#app');
