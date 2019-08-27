<template>
    <form-input type="text" ref="google_search" v-model="search" />
</template>
<script>
// import {mapMixins} from './google-mixins'
export default {
    name:'google-map-autocomplete',
    // mixins:[mapMixins],
    props:{
        google:null,
        map:null
    },
    data:()=>({
        autocomplete:null,
        search:null,
    }),
    async mounted(){
        const google = await this.google
        const { map } = await this.$nextTick(this.map)
        const { Autocomplete } =  google.maps.places
        const vm = this
        this.autocomplete = new Autocomplete(this.$refs.google_search.$el)
        this.autocomplete.bindTo('bounds', map)
        this.autocomplete.addListener('place_changed',() => {
            vm.$emit('placeChanged',vm.autocomplete.getPlace())
        })
    }
}
</script>