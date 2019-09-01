<script>
import { INFOWINDOW,RADIUS_STYLE } from './google-map-settings'

const bindGoogleMap = (vm) => {
    if(typeof vm !== 'object' && typeof vm.$gmap === 'function') throw new error('required keys is not present!')
    let a = null
    // return vm.$gmap((map)=>{
    //     return {
    //         get: () => map
    //     }
    // })
}

export default {
    template:'<div><slot/></div>',
    name:'google-marker',
    inject:{
        'gmap':{
            default:null
        },
        'cluster':{
              default:null
        }
    },
    provide(){
        return {
           'marker': new Promise((resolve, reject) => {
                this.$markerPromiseDeferred = { resolve, reject }
            })
        }
    },
    props: {
        position: {
            type: Object,
            required: true
        },
        title:null,
        isDraggable:{
            type:Boolean,
            default:false
        },
        radius:{
            type:Number,
            required:false,
            default:0
        }
    },
    beforeCreate(options){
        this.gmap = this.cluster || this.gmap 
        return this.gmap
    },
    data:()=>({
        pin:null,
        circle:null,
        center:null,
    }),
    methods:{
        setMarker(map){
            const vm = this
            const { Marker } = window.google.maps
            const {lat,lng} = this.position
            this.pin = new Marker({
                position: {
                    lat,lng
                },
                map,
                title:this.title,
                draggable:this.isDraggable
                // icon: POINT_MARKER_ICON_CONFIG
            })
             this.$markerPromiseDeferred.resolve(this.pin)
            
            // console.log(vm._map)
            window.google.maps.event.addListener(this.pin,'dragend',(args)=>
                vm.onDragend(args)
            )
            this.pin.addListener('click',()=>vm.onClickMarker(map))
        },
        onDragend({latLng,...args}) {
            this.$emit('dragend',latLng)
        },
        onClickMarker(map) {
            const marker = this.getInfoWindow()
            if(marker){
                marker.infoWindow.open(this.map,this.pin)
            }
        },
        getInfoWindow(){
            let infoWindows = this.$children.filter(component => {
                if(component.constructor.options.name === 'google-marker-info-window') return component
            })
            return  infoWindows[0]
        }
    },
    mounted(){
        const vm = this
        this.gmap.then((map)=>{
            vm.setMarker(map)
        })
    }
}
</script>