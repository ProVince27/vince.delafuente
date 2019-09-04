<script>
import { addComponents } from 'utils/bundle'
import bus from 'utils/event-bus'
import { COORDINATES } from './__includes/google-map/google-map-settings'
// import PATHS from './__includes/google-map/coordinates'
import { GoogleGeocodeMixins } from './__includes/google-map/_utils'

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
        // paths:PATHS
    }),
    components: addComponents(
            require('./__includes/google-map/google-map').default,
            // require('./__includes/google-map/google-polygon').default,
            require('./__includes/google-map/google-marker').default,
            require('./__includes/google-map/google-marker-info-window').default,
            require('./__includes/google-map/google-circle').default,
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
            // const vm = this
            this._geocode({'placeId': place_id}).then((r)=>{
                console.log()
                const pos = {
                    lat:r.geometry.location.lat(),
                    lng:r.geometry.location.lng()
                }
                this.center = pos
                this.marker = pos
                this.zoom = 15
            }).catch((e)=>{
                console.log(e)
            })
        },
    },
}

</script>