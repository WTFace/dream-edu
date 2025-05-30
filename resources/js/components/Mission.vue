<script setup>

</script>

<template>
  <div class="mission">
    <div class="text-lg font-bold my-2">
      <slot name="title" />
    </div>
    <slot />
  </div>
</template>

<style scoped>
.mission {
  @apply leading-6
}
</style>