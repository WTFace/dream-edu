<script setup>
defineProps(['logo']);
</script>

<template>
  <Link href="/" class="size-10 flex items-center">
    <img :src="logo" alt="logo" class="rounded-md">
  </Link>
</template>
