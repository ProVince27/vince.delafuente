<template>
</template>
<script>
export default {
    name:'google-marker',
    props: {
        google: {
            type: Object,
            required: true
        },
        map: {
            type: Object,
            required: true
        },
        marker: {
            type: Object,
            required: true
        },
        title:null,
        isDraggable:{
            type:Boolean,
            default:false
        }
    },
    methods:{
        setMarker(){

        }
    },
    mounted(){
        const { Marker } = this.google.maps;
        const {lat,lng} = this.marker
            new Marker({
                position: {
                    lat,lng
                },
                marker: this.marker,
                map: this.map,
                title:this.title,
                draggable:this.isDraggable
                // icon: POINT_MARKER_ICON_CONFIG
            });
    }
}
</script>