<script>
import { addComponents } from 'utils/bundle'
import { get } from 'utils/network'
import * as map from 'components/google-map'
import GeocodeMixin from 'components/google-map/utils/geocode-mixin'
// import HelperMixin from 'mixins/helperMixin'
import { LoadingMixin }  from 'components/loaders'

export default {
    template:'#google-map-container',
    name:'google-map-container',
    mixins:[ GeocodeMixin, LoadingMixin ],
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
        ...map,
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
            // vm.showProcessOn('mapis').start()
            vm.processOn('map').start()
            this.geocode({'placeId': place_id})
            .then(d => d)
            .then(({city,position,state})=>{
               
                this.marker.lat = position.lat
                this.marker.lng = position.lng
                this.center.lat = position.lat
                this.center.lng = position.lng
                this.zoom = 13
            }).catch((e)=>{
                console.log(e)
            })
            .finally(()=> vm.processOn('map').stop() )
        },
        isProcessing(){
            const vm = this    
             
            setTimeout(()=>{
              vm.processOn('demo').start()
            },3000)

           vm.processOn('demo').stop()
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