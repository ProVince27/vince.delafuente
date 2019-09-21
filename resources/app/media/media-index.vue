<script>
import addComponents from 'utils/bundle'
import * as containers from 'components/containers'
const o = import('laravel-file-manager')

export default {
    name:'media-index',
    template:'#media-index',
    components:{
        ...containers,
        
    }
}
</script>