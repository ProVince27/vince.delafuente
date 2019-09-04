<template>
    <form-input type="text" ref="google_search" v-model="search" />
</template>
<script>
import bus from 'utils/event-bus'

export default {
    name:'google-map-autocomplete',
    props:{
        bindMap:{
            default:null
        }
    },
    data:()=>({
        autocomplete:null,
        search:null,
        map:null
    }),
    mounted(){
        // console.log('map',this.bindMap)
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
            this.autocomplete = new Autocomplete(this.$refs.google_search.$el)
            this.autocomplete.addListener('place_changed',() => {
                vm.$emit('placeChanged',vm.autocomplete.getPlace(),this.autocomplete)
            })
        }
    }
}
</script>