<template>
   <div class = "image">
      <img
         :src = "image"
         :class = "['img img-responsive full-width', imageClass]"
      />
   </div>
</template>

<script>
export default {
   name: 'img-square',

   props: ['src', 'imageClass', 'defer'],

   data: function() {
      return {
         isLoaded: !this.defer
      }
   },

   mounted: function() {
      if (this.defer) {
         window.addEventListener('load', this.handleOnImageLoad)
      }
   },

   methods: {
      handleOnImageLoad() {
         this.isLoaded = true
         window.removeEventListener('load', this.handleOnImageLoad)
      }
   },

   computed: {
      image() {
         if (!this.isLoaded) {
            return 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mP89B8AAukB8/71MdcAAAAASUVORK5CYII='
         }

         return this.src || this.path('images/placeholder.jpg')
      },
   }
}
</script>

<style scoped>
   .image{
      position: relative;
      overflow: hidden;
      padding-bottom: 100%;
   }
   .image img{
      position:absolute;
      min-width: 100%;
      min-height: 100%
   }
</style>