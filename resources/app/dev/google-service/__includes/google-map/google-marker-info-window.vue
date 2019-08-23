<template>
    <div>
        <slot></slot>
    </div>
</template>
<script>
import {INFOWINDOW} from './google-map-settings'
import { mapMixins } from './google-mixins'
export default {
    name:'google-marker-info-window',
    mixins:[mapMixins],
    props:{
        marker:{
            type: Object,
            required: true
        },
        content:null
    },
    data:()=>({
        infoWindow:null
    }),
    mounted(){
        const { InfoWindow } = this.google.maps
        this.infoWindow = new InfoWindow({content: this.content||INFOWINDOW})
    }        
}
</script>