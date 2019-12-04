import Swal from 'sweetalert2'

export function alert(options = {}) {
   hideLoading()
   return Swal.fire(options)
}

export function update(options = {}) {
   return Swal.update(options)
}

export function alertError(title, message, options) {
   return alert({
      title,
      text: message,
      type: 'error',
      confirmButtonText: 'Yes',
      ...options
   })
}

export function alertSuccess(title, message, options) {
   return alert({
      title,
      text: message,
      type: 'success',
      confirmButtonText: 'Yes',
      ...options
   })
}

export function confirm(title, message, preConfirm, options) {
   return alert({
      title,
      html: message,
      type: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Yes',
      preConfirm,
      ...options
   }) 
}

export function showLoading() {
   return Swal.showLoading()
}

export function hideLoading() {
   return Swal.hideLoading()
}

export function hideAlert() {
   const promise = Swal.close()
   setTimeout(() => this.hideLoading(), 1000)
   return promise
}

export function toast(title, message, position = 'top-end', timer = 4000, options = {}) {
   return alert({
      toast: true,
      title,
      position,
      timer,
      html: message,
      ...options
   })
}

export function toastSuccess(message, options = {}) {
   const toastr = require('toastr')
   toastr.success(message)
}

export function toastError(message, options = {}) {
   const toastr = require('toastr')
//    console.log(toastr)
   toastr.error(message)
}

export function createMixin(options = {}) {
   return Swal.mixin(options)
}