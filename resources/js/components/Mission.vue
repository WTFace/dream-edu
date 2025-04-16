<script setup>

</script>

<template>
  <div class="mission">
    <slot/>
  </div>
</template>

<style scoped>
.mission {
  @apply leading-6
}

.mission span {
  @apply font-bold
}
</style>