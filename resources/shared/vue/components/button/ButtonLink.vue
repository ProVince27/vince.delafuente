<template>
   <a :class = "['btn', 'btn-' + variant]">
      <slot></slot>
   </a>
</template>

<script>
export default {
   name: 'bs-button-link',

   props: {
      variant: { type: String, default: 'primary' }
   }
}
</script>