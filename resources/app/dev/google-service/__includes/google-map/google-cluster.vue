<script>
import MarkerClusterer from '@google/markerclusterer'

export default {
    name:'google-cluster',
    inject:{
        'gmap':{default:null},
    },
    provide(){
        this.$cluster = new Promise((resolve, reject) => {
            this.$clusterPromiseDeferred = { resolve, reject }
        })
        return {
           'gmap': this.$cluster
        }
    },
    render (h) {
        return h('div',this.$slots.default)
    },
    data(){
        return {
            cluster:{},
        }
    },
    methods:{
        handleCluster(map){
            this.cluster = new MarkerClusterer(map,null,
                {imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m'}
            )
            this.$clusterPromiseDeferred.resolve(this.cluster)
        }
    },
    created(){
        this.gmap.then(this.handleCluster)
    }
}
</script>