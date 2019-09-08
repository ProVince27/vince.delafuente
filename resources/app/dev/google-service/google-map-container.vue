<script>
import { addComponents } from 'utils/bundle'
import { GoogleGeocodeMixins } from './__includes/google-map/_utils'
import {get} from 'utils/network'

export default {
    template:'#google-map-container',
    name:'google-map-container',
    mixins:[GoogleGeocodeMixins],
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
    }),
    components: addComponents(
            require('./__includes/google-map/google-map').default,
            require('./__includes/google-map/google-polygon').default,
            require('./__includes/google-map/google-heat-map').default,
            // require('./__includes/google-map/google-marker').default,
            // require('./__includes/google-map/google-marker-info-window').default,
            // require('./__includes/google-map/google-circle').default,
            require('./__includes/google-map/google-map-autocomplete').default,
            // require('./__includes/google-map/google-cluster').default
    ),
    methods:{
        addMarker(e) {
            this.markers.push({lat:lat(),lng:lng()})
        },
        handleDragend(key,e) {
            this.markers[key] = { lat:e.lat(),lng:e.lng()}
        },
        changedPlace({geometry,place_id}){
            const vm = this
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
                })
                

            }).catch((e)=>{
                console.log(e)
            })
        },
    },
}

</script>