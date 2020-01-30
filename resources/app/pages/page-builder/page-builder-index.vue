<script>
// import ClassicEditor from '@ckeditor/ckeditor5-build-classic';
// import CKEditor from '@ckeditor/ckeditor5-vue';
// import InlineCkeditor from 'components/editor/ckeditor/inline-ckeditor'

export default {
    name:'page-builder-index',
    template:'#page-builder-index',
    components:{
        // 'ckeditor':CKEditor.component,
        'inline-editor': () => import('components/editor/ckeditor/inline-ckeditor')
    },
    data(){
        return {
                // editor: ClassicEditor,
                // editorConfig:{toolbar: [ 'link', 'heading', 'bold', 'italic', 'numberedList', 'bulletedList','image']}
        }
    }
}
</script>