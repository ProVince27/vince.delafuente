<template>
   <button
      type = "submit"
      :class = "['btn', 'btn-' + variant]"
   >
      <slot></slot>
   </button>
</template>

<script>
export default {
   name: 'bs-button-submit',

   props: {
      value: { type: String, default: 'Submit' },
      variant: { type: String, default: 'primary' }
   }
}
</script>