<script setup>
import 'vue3-carousel/carousel.css'
import { Head } from '@inertiajs/vue3';
import { Carousel, Slide } from 'vue3-carousel';
import Mission from '@/components/Mission.vue';
import ImageWrap from '@/components/ImageWrap.vue';

const config = {
  height: 320,
  itemsToShow: 1,
  gap: 5,
  autoplay: 3000,
  wrapAround: true,
  dir: 'ttb',
  breakpoints: {
    1000: {
      itemsToShow: 1,
      snapAlign: 'start',
      dir: 'ltr',
      height: 480
    }
  }
}
const images = Array.from({ length: 4 }, (_, index) => ({
  id: index + 1,
  url: `/images/senior/${index + 1}.png`,
}))
</script>

<template>
  <Head title="노인복지" />
  <div class="flex h-full flex-1 flex-col gap-2 md:gap-4 items-center">
    <Carousel v-bind="config" class="rounded-2xl overflow-hidden">
      <Slide v-for="img in images" :key="img.id">
        <div class="carousel__item ">
          <img :src="img.url" alt="" class="rounded-2xl">
        </div>
      </Slide>
    </Carousel>
    <Mission class="md:w-2/5 border-b-2 border-t-2 py-2">
      2000년에 이미 고령화에 접어든 우리 사회는 노인의 삶의 질이 고형화 속도를 따라가지 못합니다. 노인이 활기차고 건강한 노후생활을 영위할 수 있도록 공익활동, 일자리, 재능나눔 등을 통해 노인복지 향상에 기여한다. <br>

      <ul class="mt-2 text-sm">
        <li>- 노래교실, 실버잔치 등 신체 활동을 통해 즐거움을 나눕니다.</li>
        <li>- 노노케어: 건강한 노인이 거동이 불편한 노인을 방문 말벗이 되어주고 식사나 산책등 일상생활을 도와주는 활동</li>
        <li>- 취약노인 발굴하여 학대예방/지원, 노인이용시설 안전관리/지원, 노인문화 복지활동 등 기타 노인권익증진 활동</li>
      </ul>
    </Mission>
    <ImageWrap class="aspect-auto">
      <img src="/images/senior/activity.png" alt="">
    </ImageWrap>
  </div>

</template>

<style scoped>

</style>