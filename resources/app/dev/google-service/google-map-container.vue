<script>
import { addComponents } from 'utils/bundle'
import bus from 'utils/event-bus'
import { COORDINATES } from './__includes/google-map/google-map-settings'
// import sample from './__includes/google-map/coordinates'

export default {
    template:'#google-map-container',
    name:'google-map-container',
    data:()=>({
        markers:COORDINATES,
        marker:{
            title:"Hello world",
            lat: 14.55272,
            lng: 121.05268
        },
        search:null,
        geocoder:null,
        center:{
            lat:14.55272,
            lng:121.05268
        },
        zoom:4
    }),
    components: addComponents(
            require('./__includes/google-map/google-map').default,
            require('./__includes/google-map/google-marker').default,
            // require('./__includes/google-map/google-marker-info-window').default,
            // require('./__includes/google-map/google-circle').default,
            require('./__includes/google-map/google-map-autocomplete').default,
            require('./__includes/google-map/google-cluster').default
    ),
    methods:{
        addMarker(e) {
            this.markers.push({lat:lat(),lng:lng()})
        },
        handleDragend(key,e) {
            this.markers[key] = { lat:e.lat(),lng:e.lng()}
        },
        changedPlace({geometry,place_id}){
            // let geocoder = await new google.maps.Geocoder();
            const vm = this
            this.geocoder.geocode({'placeId': place_id}, (results, status) => {
            if (status === 'OK') {
                const position = results[0].geometry.location
                this.center = {
                    lat:position.lat(),
                    lng:position.lng()
                }
                this.zoom = 13
                // map.setCenter(results[0].geometry.location)
                // map.setZoom(13)
                
                // this.marker ={
                //     lat:position.lat(),
                //     lng:position.lng()
                // }
            } else {
                /* geocoding logic na noong ev */
                console.log(status)
            }})
        },
        doTest(){
        const map = this.$refs.gmap.map
        // var test = new google.maps.Polygon({
        //     paths: sample,
        //     strokeColor: '#FF0000',
        //     strokeOpacity: 0.8,
        //     strokeWeight: 2,
        //     fillColor: '#FF0000',
        //     fillOpacity: 0.35
        //     });
        //     console.log(test)
        //     test.setMap(map);
        }
    },
    async mounted(){
        this.geocoder = await new google.maps.Geocoder
        
    }
}

</script>