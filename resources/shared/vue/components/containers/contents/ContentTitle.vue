<template>
    <div class="row mb-2">
        <div v-if="title" class="col-sm-12">
            <h1><i v-if="icon" :class="icon"></i>{{ title }}</h1>
        </div>
        <slot v-else></slot>
    </div>
</template>
<script>
export default {
    name:'ContentTitle',
    props:{
        title:{
            type:String,
            required:false
        },
        icon:{
            type:String,
            required:false
        }
    }
}
</script>