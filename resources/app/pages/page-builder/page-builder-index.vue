<script>
// import CKEditor from 'ckeditor4-vue';
import * as TinyEditor from 'components/editor/tiny'
export default {
    name:'page-builder-index',
    template:'#page-builder-index',
    components:{
        // 'ckeditor':CKEditor.component,
        ...TinyEditor
    },
    data(){
        return {
            // editor: ClassicEditor,
            // editorConfig:{toolbar: [ 'link', 'heading', 'bold', 'italic', 'numberedList', 'bulletedList','image']}
        }
    }
}
</script>