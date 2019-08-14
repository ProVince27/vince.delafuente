
/**
 * This will load the js file when an id found, 
 * @param {*} id - id of the DOM
 * @param {*} fn - function w/c returns the imported file ex: () => import('./bigfilehere')
 */
export function loadIfIdExists(id, fn) {
    if (document.getElementById(id)) {
       fn()
    }
 }
 
 /**
  * This will register the Vue component when an id found, 
  * @param {*} id - id of the DOM
  * @param {*} fn - function w/c returns the imported file ex: () => import('./bigfilehere')
  */
 
 export function registerComponentIfExists(id, fn) {
    if (document.getElementById(id)) {
       registerComponent(id, fn)
    }
 }
 
 export function registerComponent(id, fn) {
    const Vue = require('vue')
    Vue.component(id, fn)
 }
 
 /**
  * This will create an object to add on Vue component
  */
 
  export function addComponents(...args) {
     return args.reduce((val, component) => ({
        ...val,
        [component.name]: component
     }), {})
  }