<script>
import { addComponents } from 'utils/bundle'
import { get } from 'utils/network'
import * as containers from 'components/containers'
import * as btn from 'components/button'
import * as map from 'components/google-map'
import GeocodeMixin from 'components/google-map/utils/geocode-mixin'
import HelperMixin from 'mixins/helperMixin'

export default {
    template:'#google-map-container',
    name:'google-map-container',
    mixins:[GeocodeMixin,HelperMixin],
    data:()=>({
        marker:{
            title:"Hello world",
            lat: 14.8481447,
            lng: 120.8093657
        },
        search:null,
        geocoder:null,
        center:{
           lat: 14.8481447,
           lng: 120.8093657
        },
        zoom:13,
        paths:null,
        heatPoints:null,
        isLoading:false,
    }),
    components: {
        ...containers,
        ...map,
        ...btn
    },
    methods:{
        addMarker(e) {
            this.markers.push({lat:lat(),lng:lng()})
        },
        handleDragend(key,e) {
            this.markers[key] = { lat:e.lat(),lng:e.lng()}
        },
        changedPlace({geometry,place_id}){
            const vm = this
            vm.showProcessOn('mapis').start()
            this.geocode({'placeId': place_id})
            .then(d => d)
            .then(({city,position,state})=>{
                console.log(position)
                this.marker.lat = position.lat
                this.marker.lng = position.lng
                this.center.lat = position.lat
                this.center.lng = position.lng
                this.zoom = 13
                // this.$refs.gmap.setCenter(position);
                // console.log(this.$refs.gmap)
                /* return get(route('dev.google-kml',{
                    city,
                    state
                })).then(({data}) => {
                    vm.center = position
                    vm.zoom = 12
                    vm.paths =  data.data.map(p =>{
                         return {
                             lng:p[0],
                             lat:p[1]
                         }
                    } )
                    return vm.paths
                }).then((points)=>{
                    vm.heatPoints =  points.map((lat,lng)=>{
                        return new google.maps.LatLng(lat, lng)
                    })
                }) */
            }).catch((e)=>{
                console.log(e)
            }).finally(() => vm.showProcessOn('mapis').end() )
        },
        isProcessing(){
            const vm = this    
            setTimeout(()=>{
                vm.showProcessOn('mapis').end()
            },300)
        },
        async setHeatMakers(){
            const { data } = await get(route('dev.google-kml',{
                city:'Malolos'
            }))
            this.heatPoints = data.data.map(m => {
                let lt = {
                    location:  new google.maps.LatLng(m.lat,m.lng),
                    gradient: m.color
                }
                return lt
            })
            
        }
    },
    mounted(){
        this.setHeatMakers()
    }
}

</script>