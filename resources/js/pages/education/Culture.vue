<script setup>

import { Head } from '@inertiajs/vue3';
import EventBanner from '@/components/EventBanner.vue';

const props = defineProps({
  banners: Array
});
</script>

<template>
  <Head title="문화 교류" />
  <h1>문화 교류</h1>

  <EventBanner :banners="banners" />
</template>

<style scoped>

</style>