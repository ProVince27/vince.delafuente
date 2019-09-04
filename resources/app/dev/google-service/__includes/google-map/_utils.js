
export const GoogleGeocodeMixins = {
    data(){
        return {
            _geocoder:{},
        }
    },
    mounted(){
        this._geocoder = new google.maps.Geocoder
    },
    methods:{
        _geocode(args){
            return new Promise((resolve,reject) =>{
                vm._geocoder.geocode(args,(results, status)=>{
                    // vm._geoResult = status === 'OK' ? results[0]: false
                    if(status === 'OK'){
                        resolve(results[0])
                    }
                    reject(status)
                })
            })
        }
    }
}