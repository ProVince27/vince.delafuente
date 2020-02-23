
<template>
    <div>
        <editor :init="init" />
    </div>
</template>
<script>
/* Please see guidelines when running tinymce on your server  */
import Editor from "@tinymce/tinymce-vue";

// tinymce.activeEditor.execCommand('mceEditImage');
// tinymce.activeEditor.execCommand('mceImageRotateRight');
// tinymce.activeEditor.execCommand('mceImageRotateLeft');
// tinymce.activeEditor.execCommand('mceImageFlipVertical');
// tinymce.activeEditor.execCommand('mceImageFlipHorizontal');
console.log(tinymce)
export default {
    name: "tiny-editor",
    components: {
        Editor
    },
    data() {
        return {
            init: {
                // plugins: ["lists link image paste help wordcount code imagetools"],
                // // inline: true,
                // toolbar:["undo redo | code | image | formatselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | help"],
                // imagetools_toolbar: "rotateleft rotateright | flipv fliph | editimage imageoptions"
                height: 500,
                plugins: [
                    "advlist autolink lists link image charmap print preview anchor",
                    "searchreplace visualblocks code fullscreen",
                    "insertdatetime media table paste imagetools wordcount",
                    "imagetools"
                ],
                toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
                content_css: [
                    '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
                    '//www.tiny.cloud/css/codepen.min.css'
                ],
                imagetools_cors_hosts: ['vince.delafuente.me'],
                imagetools_toolbar: "rotateleft rotateright | flipv fliph | editimage imageoptions"
            }
        };
    }
};
</script>
