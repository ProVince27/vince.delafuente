<script>
import { addComponents } from 'utils/bundle'
import * as modal from 'components/modal'
import { VueContext } from 'vue-context';
import { LoadingMixin }  from 'components/loaders'
import { default as Stars } from 'components/extra/StarIndicator'
import { FormFileInput, FormImage, FormDateRangePicker, FormSelectSearch } from 'components/input'
import * as tab from 'components/tab'
import moment from 'moment'
import { default as tdraggable } from './draggable/test-draggable'

export default {
    name:'dashboard-admin',
    template:'#dashboard-admin',
    mixins:[LoadingMixin],
    components:{
        VueContext:VueContext,
        ...modal,
        ...tab,
        Stars,
        FormImage,
        FormDateRangePicker,
        FormSelectSearch,
        tdraggable
        // addComponents(...contents),
        // addComponents(...buttons)
    },
    data(){
        return {
            sortable:[
                {
                    id:1,
                    text:"sample1"
                },
                {
                    id:2,
                    text:"sample2"
                },
                {
                    id:3,
                    text:"sample3"
                }

            ],
            tabs:[
                {
                    id:1,
                    name:"Sample 1",
                    href:this.route('dashboard',{tab:1})
                },
                {
                    id:2,
                    name:"Sample 2",
                    href:this.route('dashboard',{tab:2})
                }
            ],
            image:'https://via.placeholder.com/300x300'
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
        },
        showImage(img){
            return null;
        },
        moment(){
            return moment()
        }
    },
    mounted(){
        // console.log(this.sortable)
    }
}
</script>