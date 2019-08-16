<template>
   <select
      class = "form-control"
      @input = "$emit('input', $event.target.value)"
      :placeholder = "placeholder"
      :value = "value"
   >
      <option
         v-for = "(option,key) in _options"
         :selected = "value === option.value"
         :value = "option.value"
        :key = "key"
      >
         {{ option.text }}
      </option>
   </select>
</template>

<script>
export default {
   name: 'form-select',

   props: {
      value: String | Number,
      placeholder: String,
      options: { type: Array }
   },

   computed: {
      _options() {
         return this.options.map(option => {
            if (typeof option === 'string')
               return { value: option, text: option }

            return option
         })
      }
   },
}
</script>