import GoogleMapsApiLoader from 'google-maps-api-loader'

const mapMixins = {
    props: {
        google: {
            type: Object,
            required: true
        },
        map: {
            type: Object,
            required: true
        },
    }
}

const googleMap = {
    data:()=>({
        _google:null,
        _geocoder:null,
    }),
    methods:{
        async _initGoogleService(key = null){
            if(!window.google){
                await GoogleMapsApiLoader({
                    apiKey: key || process.env.MIX_GOOGLE_MAP_API_KEY,
                    libraries: ['places']
                })
            }
            return window.google
        },
        _geocode() {
            const { Geocoder } = window.google.maps
            this._geocoder = new Geocoder
            return this
        },
        _geofinder(map,position = {} ){
            if(!this._geocoder) this._geocode() ;
            this._geocoder.geocode(position, (r,s) => {
               /* google  */
            })
        },
    }
}

const googleUtils = {
    methods:{
        _getParentComponent(vm,name = null) {
            console.log("parent class",vm)
        }
    }
}

export default {
    mapMixins
}

export {
    mapMixins,googleMap,googleUtils
}
