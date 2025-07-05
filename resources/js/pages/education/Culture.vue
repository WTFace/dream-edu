<script setup>

import { Head } from '@inertiajs/vue3';
import ImageWrap from '@/components/ImageWrap.vue';

const props = defineProps({
  banners: Array
});
</script>

<template>
  <Head title="문화 교류" />
  <h1>문화 교류</h1>

  <h2>행사 안내</h2>
  <div class="flex flex-col md:flex-row md:gap-2">
    <ImageWrap aspect="auto" v-for="banner in banners" :key="banner.id">
      <img :src="banner.src" alt="" class="md:max-h-[800px]">
    </ImageWrap>
  </div>
</template>

<style scoped>

</style>