<template>
   <button
      :class = "['btn', 'btn-' + variant]"
      @click = "$emit('click')"
   >
      <slot></slot>
   </button>
</template>

<script>
export default {
   name: 'bs-button',

   props: {
      variant: { type: String, default: 'primary' }
   }
}
</script>