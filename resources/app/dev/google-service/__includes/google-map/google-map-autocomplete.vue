<template>
    <form-input type="text" ref="google_search" v-model="search" />
</template>
<script>
import bus from 'utils/event-bus'

export default {
    name:'google-map-autocomplete',
    props:{
        countryRestriction:{
            default:'ph'
        },
        types:{
            type:Array,
            default:()=>(['geocode'])
        }
    },
    data:()=>({
        autocomplete:null,
        search:null,
        map:null
    }),
    mounted(){
        this.initSearch()
    },
    destroyed(){
        if(this.bindMap){
            bus.$off(this.bindMap)
        }
    },
    methods:{
        initSearch(){
            const vm = this
            const { Autocomplete } =  google.maps.places
            this.autocomplete = new Autocomplete(this.$refs.google_search.$el,{
                types: this.types,
                componentRestrictions: { country: this.countryRestriction }
            })
            
            this.autocomplete.addListener('place_changed',() => {
                vm.$emit('placeChanged',vm.autocomplete.getPlace(),this.autocomplete)
            })
        }
    }
}
</script>