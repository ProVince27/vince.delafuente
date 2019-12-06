require('./bootstrap');

import Vue from 'vue'
import Vuex from 'vuex'
import store from 'store'

import FileManager from 'laravel-file-manager'

Vue.use(Vuex);

Vue.use(FileManager, {
    store
});

/* global components */
import * as contents from 'components/containers'
import * as buttons from 'components/button'
import * as headings from 'components/headings'
import {
    Loading
} from 'components/loaders'

const globalComponent = {
    ...contents,
    ...buttons,
    ...headings,
    Loading
}
// load all global components
Object.keys(globalComponent)
    .forEach(key => Vue.component(globalComponent[key].name, globalComponent[key]))


import './app/dashboard/dashboard'

import './app/dev/google-service/google-service'

import './app/media/media'

import './app/dev/underconstruction/underconstruction'

Vue.mixin({
    methods: {
        route: window.route,
        path: (name) => `${window.public_path}${name}`,
        changedDragableCss(item) {
            if (item.forEach) {
                item.forEach((i) => {
                    $(i.$el).css({
                        'transform': 'none'
                    })
                })
            }
        },
        uuid(key = null) {
            let id = 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, function (c) {
                var r = Math.random() * 16 | 0,
                    v = c == 'x' ? r : (r & 0x3 | 0x8);
                return v.toString(16);
            });
            return key !== null ? id : `${id}-${key}`
        }
    }
});

Vue.prototype.$EventBus = new Vue()

// initialize parent component
const app = new Vue({
    store
}).$mount('#app');
