<template>
  <div>
    <slot class="info-window-content d-none" :pin="pin" :test="test"></slot>
  </div>
</template>
<script>
import { INFOWINDOW } from './google-map-settings'
export default {
    name:'google-marker-info-window',
    inject:['marker'],
    props:{
       content:null
    },
    data:()=>({
        infoWindow:null,
        detail:null,
        pin:null,
        test:"ano na"

    }),
    computed:{
        getContent(){
            const content = $(this.$el)
            if(!content) return null
            return content.html()
        }
    },
    created(){
        const { InfoWindow } = google.maps
        this.infoWindow = new InfoWindow({content: this.getContent})
        const vm = this
        this.marker.then((marker)=>{
            console.log('ano ito',marker.position.lat())
            vm.pin = marker
        })
    },
    mounted(){
        console.log(this.pin)
        
    }
}
</script>