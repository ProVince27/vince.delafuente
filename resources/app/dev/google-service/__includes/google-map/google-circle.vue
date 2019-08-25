<template></template>
<script>
import { mapMixins } from './google-mixins'
import { RADIUS_STYLE } from './google-map-settings'
export default {
    name:'google-circle',
    mixins:[mapMixins],
    props:{
        marker:{
            type:Object,
            required:false
        },
        radius:{
            type:Number,
            require:true
        },
        styling:{
            type:Object,
            required:false,
            default:()=>({
                ...RADIUS_STYLE
            })
        },
        center:{
            require:false,
            type:Object,
        },
        lat:null,
        lng:null
    },
    data:()=>({
        circle:null,
        position:null,
    }),
    methods:{
        initCircle(){
            if(this.marker){
                const { lat,lng } = this.marker.position
                this.position = {
                    lat:lat(),
                    lng:lng()
                }
            }
            
            const { Circle } = this.google.maps
            const center = this.position || this.center || {
                    lat:this.lat,
                    lng:this.lng
                }
            this.circle = new Circle({
                ...this.styling,
                radius:this.radius,
                center,
                map:this.map
            })

            if(this.marker){
                  this.circle.bindTo("center", this.marker, "position");
            }
        }
    },
    mounted(){
        this.initCircle()
    }
}
</script>