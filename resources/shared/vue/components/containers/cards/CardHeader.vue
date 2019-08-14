<template>
    <div class="card-header">
        <template v-show="title">
            <h3 class="card-title" v-html="title"></h3>
        </template>
        <slot></slot>
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