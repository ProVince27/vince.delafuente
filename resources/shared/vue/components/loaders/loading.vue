<template >
    <div v-if="run" class="overlay dark">
        <i :class="icon"></i>
        <div v-if="message" v-text="message"></div>
    </div>
</template>

<script>
export default {
    name:'loading',
    props:{
        inProgress:{
            type:Boolean,
            default:false
        },
        icon:{
            type:String,
            default:'fas fa-2x fa-sync-alt fa-spin'
        },
        message:{
            type:String,
        }
    },
    data(){
        return {
            run:this.inProgress
        }
    },
    methods:{
        start(){
            this.run = true
        },
        stop(){
            this.run = false
        }
    }
}
</script>