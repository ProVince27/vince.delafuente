export default {
   data: function() {
      return {
         imgMixin: {
            maxSize: 1000000
         }
      }
   },

   methods: {
      getImageDataUrl(image) {
         return new Promise((resolve, reject) => {
            try {
               const reader = new FileReader()
               reader.onloadend = () => {
                  resolve(reader.result)
               }
               reader.readAsDataURL(image)
            } catch (error) {
               reject(error)
            }
         })
      },

      setDefaultMaxSize(size) {
         this.imgMixin.maxSize = size
      },

      isFileImage(file) {
         /**
          *  will bypass checking of type, if type is not supported on certain browser.
          *  https://developer.mozilla.org/en-US/docs/Web/API/File
          */
         if (typeof file.type !== 'string') return true
         return ['image/jpeg', 'image/jpg', 'image/png', 'image/gif'].indexOf(file.type) >= 0
      },

      isFileSizeValid(file, maxSize) {
         return (maxSize || this.imgMixin.maxSize) > file.size
      },

      isFileValid(file, maxSize) {
         return !this.isFileImage(file)
            ? 'Please select a valid image.'
            : !this.isFileSizeValid(file, maxSize)
               ? 'File size must not exceed 1MB.'
               : true
         
      }
   },
}