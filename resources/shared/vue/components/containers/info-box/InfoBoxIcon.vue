<template>
    <span class="info-box-icon ">
        <i :class="icon"></i>
    </span>
</template>
<script>
export default {
    name:'InfoBoxIcon',
    props:{
        icon:{
            type:String,
            required:true
        }
    }
}
</script>