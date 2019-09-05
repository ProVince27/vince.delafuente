<template></template>
<script>
// import { mapMixins } from './google-mixins'
import { RADIUS_STYLE } from './google-map-settings'
export default {
    name:'google-circle',
    inject:['$marker'],
    props:{
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
        initCircle(marker){
            if(marker){
                const { lat,lng } = marker.position
                this.position = {
                    lat:lat(),
                    lng:lng()
                }
            }
            const { Circle } = window.google.maps
            const center = this.position
            this.circle = new Circle({
                ...this.styling,
                radius:this.radius,
                center,
                map:marker.map
            })

            if(marker){
                this.circle.bindTo("center", marker, "position");
            }
        }
    },
    mounted(){
        const vm = this
        this.$marker.then((marker)=>{
            vm.initCircle(marker)
        })
    }
}
</script>