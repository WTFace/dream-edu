<script setup>
defineProps({
  aspect: {
    type: String,
    default: 'video'
  },

})
</script>

<template>
  <div class="img-wrap rounded-3xl" :class="`aspect-${aspect}`">
    <slot></slot>
  </div>
</template>

<style scoped>

</style>