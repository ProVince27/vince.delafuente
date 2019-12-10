<template>
    <div 
        class="tab-pane fade" 
        :class="{'show active': isActive, 'd-none':!isActive }"
        role="tabpanel" 
        aria-labelledby=""

    >
        <slot /> 
    </div>
</template>
<script>
export default {
    name:'tab',
    data(){
        return {
            isActive:false
        }
    },
    computed:{
        hashId(){
            return `#`
        }
    }
}
</script>
