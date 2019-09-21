<template>
    <div class="card">
        <template v-if="processing">
            <div class="overlay dark">
              <i class="fas fa-2x fa-sync-alt fa-spin"></i>
            </div>
        </template>
        <slot></slot>
    </div>
</template>
<script>
export default {
    name:"card",
    props:{
        isProcessing:{
            type:Boolean,
            default:false
        }
    },
    data(){
        return {
            processing:this.isProcessing
        }
    },
    methods:{
        start(){
            this.processing = true
        },
        end(){
            this.processing = false
        }
    }
}
</script>