<template>
    <div class="google-map" ref="map">
        <slot />
    </div>
</template>
<script>

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
        mapConfig:{
            type:Object,
            default: () => ({
                zoom:5,
                center:{
                    lat:12.8797,
                    lng:121.7740
                }
            })
        }
    },
    data:() => ({map:null}),
    mounted(){
        this.map = new google.maps.Map(
                this.$refs['map'],this.mapConfig
        ) 
        this.$mapPromiseDeferred.resolve(this.map)
    },
}
</script>
<style scoped>
.google-map {
  width: 100%;
  min-height: 100%;
}
</style>
