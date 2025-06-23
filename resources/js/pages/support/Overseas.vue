<script setup>

import Mission from '@/components/Mission.vue';
import ImageWrap from '@/components/ImageWrap.vue';
</script>

<template>
  <h1>해외봉사 지원</h1>
  <div class="md:w-1/2">
    지구촌 모든 이들의 인권증진을 목표로 하는 구호사업은 다양한 캠페인과 쉽고 재미있는 기부를 통해 모두가 차별없이 함께 살아갈수 있는 사회를 만들고 있습니다.
    나눔과 연대의 정신을 키우는 모금활동을 통해 도움이 필요한 곳을 꾸준히 지원합니다.
  </div>
  <div class="grid auto-rows-min gap-4 md:grid-cols-2">
    <ImageWrap>
      <img src="https://d2os5j0fcu66cq.cloudfront.net/goodnewscorps/web/assets/images/photo/gd_img02.jpg"
           alt="good news medical">
    </ImageWrap>
    <ImageWrap>
      <img src="https://live.staticflickr.com/6155/6151775897_45aeb09264_c.jpg" alt="computer class"
           class="h-full w-full">
    </ImageWrap>
    <Mission class="md:col-span-2 md:mx-[24%]">
      사람은 누구를 만나느냐에 따라 미래가 달라집니다.
      교실조차 없는 아이들에게 해외봉사 단원들은 움직이는 학교가 되어줍니다.
      그들에게 배운 아이들이 훗날 또 다른 천 명의 삶을 바꿀 것입니다.
    </Mission>
    <ImageWrap>
      <img src="https://live.staticflickr.com/6196/6149683539_cfc25a8b3b_c.jpg" alt="reading">
    </ImageWrap>
    <ImageWrap>
      <img src="https://live.staticflickr.com/6165/6151952254_3aeb85e8aa_c.jpg" alt="with children">
    </ImageWrap>
  </div>
</template>

<style scoped>

</style>