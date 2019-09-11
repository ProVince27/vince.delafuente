import * as alert from 'utils/alert'

export default {
   methods: {
      alertError: alert.alertError,
      alertSuccess: alert.alertSuccess,
      alert: alert.alert,

      confirm: alert.confirm,
      hideAlert: alert.hideAlert,
      showLoading: alert.showLoading,
      hideLoading: alert.hideLoading,

      toast: alert.toast,
      toastSuccess: alert.toastSuccess,
      toastError: alert.toastError,

      alertLoader(title,  options) {
         alert.alert({ title, allowOutsideClick: false,...options })
         alert.showLoading()
      },


   }
}