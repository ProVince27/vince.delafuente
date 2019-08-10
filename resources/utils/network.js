

export function send(url, data, method, options = {}) {
    const headers = {
       ...getDefaultHeaders(),
       ...options.headers || {}
    }
 
    return axios({ url, method, data, headers })
       .catch(error => {
          if (error.response && error.response.data) {
             throw error.response.data
          }
 
          if (error.message === 'Server Error') {
             throw {
                message: 'Unable to process request. Please try again.'
             }
          }
 
          throw error
       })
 }
 
 export function get(url, options = {}) {
    return send(url, {}, 'GET', options)
 }
 
 
 export function post(url, data, options = {}) {
    return send(url, data, 'POST', options)
 }
 
 export function put(url, data, options = {}) {
    return send(url, { ...data, _method: 'PUT' }, 'POST', options)
 }
 
 export function remove(url, options = {}) {
    return send(url, { _method: 'DELETE' } , 'POST', options)
 }
 
 export function getDefaultHeaders() {
    return {
       'Content-Type': 'application/json'
    }
 }
 