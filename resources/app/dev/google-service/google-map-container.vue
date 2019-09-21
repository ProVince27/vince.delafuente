<script>
import { addComponents } from 'utils/bundle'
import { get } from 'utils/network'
import * as containers from 'components/containers'
import * as map from 'components/google-map'
import GeocodeMixin from 'components/google-map/utils/geocode-mixin'

export default {
    template:'#google-map-container',
    name:'google-map-container',
    mixins:[GeocodeMixin],
    data:()=>({
        // markers:PATHS,
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
        ...map
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
            vm.isLoading = true;
            this.geocode({'placeId': place_id})
            .then(d => d)
            .then(({city,position,state})=>{
                return get(route('dev.google-kml',{
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
                    // console.log(points)
                    vm.heatPoints =  points.map((lat,lng)=>{
                        return new google.maps.LatLng(lat, lng)
                    })

                    vm.isLoading = false;
                })
                

            }).catch((e)=>{
                vm.isLoading = false;
                console.log(e)
            })
        },
    },
}

</script>