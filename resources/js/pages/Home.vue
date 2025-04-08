<script setup lang="ts">
import { type BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/vue3';
import Mission from '@/components/Mission.vue';

const breadcrumbs: BreadcrumbItem[] = [
  {
    title: 'Dashboard',
    href: '/dashboard'
  }
];
</script>

<template>
  <Head title="Dashboard" />
  <div class="flex h-full flex-1 flex-col gap-4 rounded-xl">
    <div class="flex flex-col-reverse md:flex-row gap-2 md:gap-4 items-center">
      <div class="md:w-2/5">
        <h1 class="mb-1">국제드림교육원은?</h1>
        <div class="font-bold mb-1 md:mb-3">International Dream Education Center</div>
        <div>탐라국의 정신을 바탕으로 설립된 국제구호개발 및 전국지역의 특성과 종교적인 틀에서 벗어나 <br>
          장애인, 미망인, 노인, 고아 등 국내/외 인권 취약 계층에게 지속적인 구호사업과 지원을 통하여 <br>
          인권을 회복하며 신체적, 정신적, 사회적으로 꿈과 희망을 심어주는 활동에 정성을 다하고 있습니다.
        </div>
      </div>
      <img class="img-wrap rounded-3xl md:w-3/5" src="/images/main/banner1.png" alt="classroom in africa">
    </div>
    <Mission class="hidden md:block mt-2" />
    <div class="grid auto-rows-min gap-4 md:grid-cols-2">
      <div class="aspect-video img-wrap rounded-2xl">
        <img src="https://live.staticflickr.com/6208/6151473085_be814718a0_c.jpg" alt="main">
      </div>
      <Mission class="md:hidden" />
      <div class="aspect-video img-wrap rounded-2xl">
        <img src="/images/main/main-banner-2.png" alt="kids bucket list">
      </div>
    </div>

  </div>
</template>
<style scoped>
.img-wrap {
  @apply relative overflow-hidden border border-sidebar-border/70 dark:border-sidebar-border;
}
</style>
