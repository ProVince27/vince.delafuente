<template>
    <div>
        <div class="google-map" :ref="container"></div>
        <template v-if="Boolean(this.google) && Boolean(this.map)">
            <slot :google="google" :map="map" />
        </template>
    </div>
</template>
<script>
import GoogleMapsApiLoader from 'google-maps-api-loader'
import {COORDINATES} from './google-map-settings'
import { googleMap } from './google-mixins'

export default {
    name:'google-map',
    mixins:[googleMap],
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
        },
        apiKey:{
            type:String,
            required:false,
            default:null
        },
        initGoogle:{
            required:true,
            default:null
        }
    },
    data: () => ({
        google:null,
        map:null,
    }),
    methods:{
        initialize(){
            const mapContainer = this.$refs[this.container]
            this.map = new this.google.maps.Map(
                mapContainer,this.mapConfig
            )
            this.$emit('getMap',this.map)
            this.addMarker()
        },
        addMarker(){
            const vm = this
            new this.google.maps.event.addListener(this.map, 'click', (e) => {
                vm.placeMarker(e);
            });
        },
        placeMarker(position){
            this.$emit("pinned",position)
        },
    },
    computed:{
        container(){
            return `google-map-${this._uid}`
        }
    },
    async mounted() {
        
        this.google = await this.initGoogle
        //  || await this._initGoogleService(this.apiKey || process.env.MIX_GOOGLE_MAP_API_KEY)
        this.initialize()
    }
}
</script>
<style scoped>
.google-map {
  width: 100%;
  min-height: 100%;
}
</style>
