<template>
    <div class="card-header">
        <template v-if="title">
            <h3 class="card-title" v-html="title"></h3>
        </template>
        <slot v-else></slot>
        <!-- <slot name="card-tools"></slot> -->
    </div>
</template>
<script>
export default {
    name:"card-header",
    props:{
        title:null
    }
}
</script>