<script setup>
defineProps(['title']);
</script>

<template>
  <div class="text-center md:w-1/3">
    <div class="font-bold my-2">{{ title }}</div>
    <slot />
  </div>
</template>

<style scoped>

</style>