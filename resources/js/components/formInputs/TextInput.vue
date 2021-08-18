<template>
  <div class="">
    <input
      class="my-search-input"
      :type="inputType"
      :placeholder="placeholder"
      :value="value"
      @input="$emit('input', $event.currentTarget.value)"
    />
  </div>
</template>

<script>
export default {
  name: "TextInput", 
  props: {
    value: String,
    placeholder: String,
    inputType: {
      type: String,
      default: "text",
    },
  },
};
</script>
