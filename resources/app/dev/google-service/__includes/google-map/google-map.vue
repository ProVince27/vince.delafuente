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
        bindMap:{
            default:null
        },
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
        this.map = new google.maps.Map(
            this.$refs['map'],{
                zoom:this.zoom,
                center:this.center,
                mapTypeId:this.mapType
            }
        )
        this.$mapPromiseDeferred.resolve(this.map)
        if(this.bindMap){ bus.$emit(this.bindMap,this.map)}
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
