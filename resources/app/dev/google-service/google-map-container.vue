<script>
import { addComponents } from 'utils/bundle'
import { COORDINATES } from './__includes/google-map/google-map-settings'
import {default as google_map} from './__includes/google-map/google-map'
import {default as google_marker} from './__includes/google-map/google-marker'

export default {
    template:'#google-map-container',
    name:'google-map-container',
    data:()=>({
        markers:COORDINATES,
        googleSearch:null,
    }),
    components: addComponents(
            require('./__includes/google-map/google-map').default,
            require('./__includes/google-map/google-marker').default,
            require('./__includes/google-map/google-marker-info-window').default,
            require('./__includes/google-map/google-circle').default,
            // require('./__includes/google-map/google-map-autocomplete').default
    ),
    methods:{
        addMarker(e) {
            const {lat,lng} = e.latLng
            this.markers.push({lat:lat(),lng:lng()})
        },
        handleDragend(key,e) {
            this.markers[key] = { lat:e.lat(),lng:e.lng()}
        },
        setMap(map){
            this.map =  map
        },
        getPlaceChanged({geometry,place_id}) {
            const { lat, lng } = geometry.location
            const result = this._geofinder(this.map,{placeId:place_id})
        }
    }
}

</script>