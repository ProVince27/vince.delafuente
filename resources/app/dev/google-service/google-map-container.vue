<script>
import { addComponents } from 'utils/bundle'
import { COORDINATES } from './__includes/google-map/google-map-settings'
export default {
    template:'#google-map-container',
    name:'google-map-container',
    data:()=>({markers:COORDINATES}),
    components: addComponents(
        require('./__includes/google-map/google-map').default,
        require('./__includes/google-map/google-marker').default
    ),
    methods:{
        addMarker(e) {
            const {lat,lng} = e.latLng
            this.markers.push({lat:lat(),lng:lng()})
        }
    }
}
</script>