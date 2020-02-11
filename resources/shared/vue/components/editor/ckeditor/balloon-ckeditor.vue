<template>
    <div ref="inline" class="ck-inline-editor"></div>
</template>
<script>
import BalloonEditor from '@ckeditor/ckeditor5-build-balloon';
export default {
    name: "ballon-ckeditor",
    props: {
        data: null
    },
    data() {
        return {
            model: this.data
        };
    },
    computed: {
        ckFinder() {
            return {
                toolbar: [
                    "heading",
                    "fontsize",
                    "fontfamily",
                    "bold",
                    "italic",
                    "underline",
                    "strikethrough",
                    "highlight",
                    "alignment",
                    "numberedList",
                    "bulletedList",
                    "link",
                    "blockquote",
                    "insertTable",
                    "mediaEmbed",
                    "imageUpload",
                    "ckfinder",
                    "undo",
                    "redo",
                    "paragraph"
                ],
                ckfinder: {
                    // Upload the images to the server using the CKFinder QuickUpload command.
                    // uploadUrl: 'https://example.com/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images&responseType=json',
                    // Define the CKFinder configuration (if necessary).
                    options: {
                        //    resourceType: 'Images',
                        // This must go to the `options`:
                        connectorPath: route("ckfinder_connector").template
                        // connectorPath: route('ckfinder.upload').template,
                        // connectorPath: route('ckfinder_examples',{images:'jpeg'}).template,
                    }
                }
            };
        }
    },
    mounted() {
        const vm = this;
        BalloonEditor.create(this.$el, this.ckFinder)
            .then(editor => {
                if (editor.state === "ready") {
                    editor.model.document.on("change:data", e => {
                        vm.model = editor.getData();
                        vm.$emit("input", editor.getData());
                    });
                }
            })
            .catch(error => {
                console.error(error);
            });
    }
};
</script>
<style scoped>
.ck-inline-editor {
    border: dashed 1px #c9c9c9;
}
</style> 
