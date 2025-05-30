<script setup>
import 'vue3-carousel/carousel.css';
import ImageWrap from '@/components/ImageWrap.vue';
import Mission from '@/components/Mission.vue';
import { Carousel, Slide } from 'vue3-carousel';
import { Head } from '@inertiajs/vue3';

const config = {
  height: 320,
  itemsToShow: 1,
  gap: 5,
  autoplay: 4000,
  wrapAround: true,
  dir: 'ttb',
  breakpoints: {
    1000: {
      snapAlign: 'start',
      dir: 'ltr',
      height: 480
    }
  }
};
const images = Array.from({ length: 4 }, (_, index) => ({
  id: index + 1,
  url: `/images/silverClass/silver${index + 1}.jpeg`
}));
</script>

<template>
  <Head title="청춘교실" />
  <h1>청춘교실</h1>

  <Carousel v-bind="config" class="carousel-wrap">
    <Slide v-for="img in images" :key="img.id">
      <div class="carousel__item ">
        <img :src="img.url" alt="" class="rounded-2xl">
      </div>
    </Slide>
  </Carousel>
  <Mission class="md:w-3/5 border-b-2 border-t-2 py-3">
    65세 이상을 대상으로 다양한 프로그램을 통해 자기 개발과 더불어 사회참여 기회를 제공해 즐겁고 보람찬 노년을 보낼 수 있도록 모든 프로 그램을 기획, 진행합니다. <br>
    프로그램: <span class="font-semibold">노래교실, 댄스교실, 레크레이션, 효잔치, 웃음치료, 건강박수, 야외 나들이</span>
  </Mission>
  <ImageWrap aspect="auto" class="md:w-2/3">
    <img src="/images/silverClass/activity.jpeg" alt="">
  </ImageWrap>
</template>

<style scoped>

</style>