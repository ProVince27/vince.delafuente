<template>
    <div>
        <slot :pin="pin" :google="google" />
    </div>
</template>
<script>
import { INFOWINDOW,RADIUS_STYLE } from './google-map-settings'
import { mapMixins } from './google-mixins'
export default {
    name:'google-marker',
    mixins:[mapMixins],
    props: {
        marker: {
            type: Object,
            required: true
        },
        title:null,
        isDraggable:{
            type:Boolean,
            default:false
        },
        radius:{
            type:Number,
            required:false,
            default:0
        }
    },
    data:()=>({
        pin:null,
        circle:null,
        center:null
    }),
    methods:{
        setMarker(){
            const vm = this
            const { Marker, InfoWindow, } = this.google.maps
            const {lat,lng} = this.marker
            this.pin = new Marker({
                position: {
                    lat,lng
                },
                marker: this.marker,
                map: this.map,
                title:this.title,
                draggable:this.isDraggable
                // icon: POINT_MARKER_ICON_CONFIG
            })
            this.google.maps.event.addListener(this.pin,'dragend',(args)=>
                vm.onDragend(args)
            )
            this.pin.addListener('click',()=>vm.onClickMarker())
            this.hasCircle()
        },
        onDragend({latLng,...args}) {
            this.$emit('dragend',latLng)
        },
        onClickMarker() {
          this.getInfoWindow().infoWindow.open(this.map,this.pin)
        },
        hasCircle(){
            if(!this.radius) return;
            const { Circle } = this.google.maps
            const {lat,lng} = this.marker 
            this.circle = new Circle({
                ...RADIUS_STYLE,
                radius:this.radius,
                center:{lat,lng},
                map:this.map
            })
            this.circle.bindTo("center", this.pin, "position");
        },
        getInfoWindow(){
            let infoWindows = this.$children.filter(component => {
                if(component.constructor.options.name === 'google-marker-info-window') return component
            })
            return  _.first(infoWindows)
        }
    },
    created(){
        this.setMarker()
    }
}
</script>