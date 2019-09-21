<script>
import { addComponents } from 'utils/bundle'
// import {CardHeader,Card,CardBody} from 'components/containers/cards'
import * as contents from 'components/containers'
import * as buttons from 'components/button'

export default {
    name:'dashboard-admin',
    template:'#dashboard-admin',
    components:{
        ...contents,
        ...buttons
        // addComponents(...contents),
        // addComponents(...buttons)
    },
}
</script>