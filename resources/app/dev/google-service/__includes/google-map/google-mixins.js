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
    methods:{
        async _initGoogleMap(key = null){
            const googleMapApi = await GoogleMapsApiLoader({
                apiKey: key || process.env.MIX_GOOGLE_MAP_API_KEY
            })
            return googleMapApi
        }
    }
}

export default {
    mapMixins
}

export {
    mapMixins,googleMap
}
