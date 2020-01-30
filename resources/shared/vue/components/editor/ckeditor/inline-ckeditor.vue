<template>
    <div ref="inline" id="inline"></div>
</template>
<script>
import InlineEditor from '@ckeditor/ckeditor5-build-inline';
export default {
    name:'inline-ckeditor',
    props:{
        data:null
    },
    data(){
        return {
            model:this.data
        }
    },
    mounted(){
        const vm = this
        InlineEditor.create( this.$el )
        .then( editor => {
            if(editor.state === 'ready'){
                editor.model.document.on( 'change:data', (e) => {
                    vm.model = editor.getData()
                    vm.$emit('input',editor.getData())
                });
            }
        } )
        .catch( error => {
            console.error( error );
        } );
    }
}
</script>