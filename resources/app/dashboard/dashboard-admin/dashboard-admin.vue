<script>
import { addComponents } from 'utils/bundle'
// import {CardHeader,Card,CardBody} from 'components/containers/cards'
import * as contents from 'components/containers'
import * as buttons from 'components/button'
import draggable from 'vuedraggable'

export default {
    name:'dashboard-admin',
    template:'#dashboard-admin',
    components:{
        ...contents,
        ...buttons,
        ...addComponents(draggable)
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
    mounted(){
        console.log(this.sortable)
    }
}
</script>