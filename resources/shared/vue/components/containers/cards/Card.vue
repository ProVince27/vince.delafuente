<template>
    <div class="card">
        <template v-if="isLoading">
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
        isLoading:{
            type:Boolean,
            default:false
        }
    }
}
</script>