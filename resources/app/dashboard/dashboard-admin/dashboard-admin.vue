<script>
import { addComponents } from 'utils/bundle'
import * as contents from 'components/containers'
import * as buttons from 'components/button'
import * as modal from 'components/modal'
import { VueContext } from 'vue-context';
// import draggable from 'vuedraggable'
// console.log(modal)


export default {
    name:'dashboard-admin',
    template:'#dashboard-admin',
    components:{
        ...contents,
        ...buttons,
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
        }
    },
    mounted(){
        // console.log(this.sortable)
    }
}
</script>