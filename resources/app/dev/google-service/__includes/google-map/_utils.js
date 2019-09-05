
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
                this._geocoder.geocode(args,(results, status)=>{
                    if(status === 'OK'){ resolve(results[0]) }
                    reject(status)
                })
            })
        }
    }
}