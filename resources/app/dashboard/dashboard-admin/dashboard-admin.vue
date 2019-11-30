<script>
import { addComponents } from 'utils/bundle'
import * as modal from 'components/modal'
import { VueContext } from 'vue-context';
import { LoadingMixin }  from 'components/loaders'
// import draggable from 'vuedraggable'

export default {
    name:'dashboard-admin',
    template:'#dashboard-admin',
    mixins:[LoadingMixin],
    components:{
        
        VueContext:VueContext,
        ...modal
        // addComponents(...contents),
        // addComponents(...buttons)
    },
    data(){
        return {
            sortable:[
                {
                    id:1,
                    name:"sample1"
                },
                {
                    id:2,
                    name:"sample2"
                },
                {
                    id:3,
                    name:"sample3"
                }

            ]
        }
    },
    methods:{
        onClick(e){
           
        },
        openModal(){
            // console.log(this.$refs.basic)
        },
        runLoading(){
            this.processOn('demo').start() 
            setTimeout(()=>{  this.processOn('demo').stop() },300)
        }
    },
    mounted(){
        // console.log(this.sortable)
    }
}
</script>