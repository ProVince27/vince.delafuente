<template>
    <div class="modal fade" :id="id">
        <div class="modal-dialog" :class="dialogStyle" >
            <div class="modal-content"  >
                <slot />
            </div>
        </div>
    </div>
</template>
<script>
export default {
    name:'modal',
    props:{
        id:{
            required:true
        },
        size:null,
        align:null,
    },
    computed:{
        dialogStyle(){
            return {
                'modal-xl': this.size === 'xl', 
                'modal-lg': this.size === 'lg',
                'modal-sm':  this.size === 'sm',
                'modal-dialog-centered' : this.align === 'centered'
            }
        },
    },
    
}
</script>
