<script>
export default {
    name:'google-heat-map',
    inject:['gmap'],
    render (h) {
        return h('div',this.$slots.default)
    },
    props:{
        points:null,
        radius:{},
        opacity:{},
        center:{},
        zoom:{},
    },
    data(){
        return {
            heatMap:{},
        }
    },
    methods:{
        componentWillCreate(map){
            this.heatMap = new google.maps.visualization.HeatmapLayer({
                data: this.points,
                map,
                gradient:[
                    'rgba(0, 255, 255, 0)',
                    'rgba(0, 255, 255, 1)',
                    'rgba(0, 191, 255, 1)',
                    'rgba(0, 127, 255, 1)',
                    'rgba(0, 63, 255, 1)',
                    'rgba(0, 0, 255, 1)',
                    'rgba(0, 0, 223, 1)',
                    'rgba(0, 0, 191, 1)',
                    'rgba(0, 0, 159, 1)',
                    'rgba(0, 0, 127, 1)',
                    'rgba(63, 0, 91, 1)',
                    'rgba(127, 0, 63, 1)',
                    'rgba(191, 0, 31, 1)',
                    'rgba(255, 0, 0, 1)'
                ]
            });
            
        },
    },
    mounted(){
        this.gmap.then(this.componentWillCreate)
    },
    watch:{
        points(n){
            this.heatMap.set('data',n)
        }
    }

}
</script>