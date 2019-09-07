<template>
    <div class="google-map" ref="map">
        <slot />
    </div>
</template>
<script>
import bus from 'utils/event-bus'

export default {
    name:'google-map',
    provide() {
        return {
           'gmap': new Promise((resolve, reject) => {
                this.$mapPromiseDeferred = { resolve, reject }
            })
        }
    },
    props:{
        center:{
            default(){
                return {
                    lat:14.55272,
                    lng:121.05268
                }
            }
        },
        zoom:{
            default:9,
            type:Number
        },
        mapType:{
            default:"roadmap",
            type:String
        }
    },
    data:() => ({map:null}),
    mounted() {
        const vm = this
        this.map = new google.maps.Map(
            this.$refs['map'],{
                zoom:this.zoom,
                center:this.center,
                mapTypeId:this.mapType
            }
        )
        this.$mapPromiseDeferred.resolve(this.map)
        this.map.addListener('zoom_changed', function() {
            vm.$emit('zoom_changed',vm.map.getZoom())
        });
        
        this.$emit('onLoadMap',this.map)
    },
    watch:{
        center(n){
            this.map.setCenter(n)
        },
        zoom(n){
            this.map.setZoom(n)
        }
    }
}
</script>
<style scoped>
.google-map {
  width: 100%;
  min-height: 100%;
}
</style>
