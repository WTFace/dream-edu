<script setup>
defineProps(['banners']);
import ImageWrap from '@/components/ImageWrap.vue';
</script>

<template>
  <h2 v-if="banners.length">행사 안내</h2>
  <div class="flex flex-col md:flex-row md:gap-2">
    <ImageWrap aspect="auto" v-for="banner in banners" :key="banner.id">
      <img :src="banner.src" alt="" class="md:max-h-[800px]">
    </ImageWrap>
  </div>
</template>

<style scoped>

</style>