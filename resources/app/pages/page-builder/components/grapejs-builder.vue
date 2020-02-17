<template>
    <div></div>
</template>
<script>
import 'grapesjs/dist/css/grapes.min.css';
import grapesjs from 'grapesjs';

export default {
    name:'grapejs-builder',
    mounted(){
        const grape = grapesjs.init({
            container : this.$el,
            components: '<div class="txt-red">Hello world!</div>',
            style: '.txt-red{color: red}',
        });
    }
}
</script>