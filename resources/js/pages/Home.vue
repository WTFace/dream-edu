<script setup lang="ts">
import { type BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/vue3';
import Mission from '@/components/Mission.vue';
import ImageWrap from "@/components/ImageWrap.vue";

const breadcrumbs: BreadcrumbItem[] = [
  {
    title: 'Dashboard',
    href: '/dashboard'
  }
];
</script>

<template>
  <Head title="Dashboard" />
    <div class="flex flex-col-reverse md:flex-row gap-2 md:gap-4 items-center">
      <div class="md:w-2/5">
        <h1 class="mb-1">국제드림교육원은?</h1>
        <div class="font-bold mb-1 md:mb-3">International Dream Education Center</div>
        <div class="leading-6">
          탐라국의 정신을 바탕으로 국제구호개발 및 전국지역의 특성과 종교적인 틀에서 벗어나 장애인, 미망인, 노인, 고아 등 국내/외 취약 계층에게 지속적인 지원을 통하여
          인권을 회복하며 신체적, 정신적, 사회적으로 꿈과 희망을 심어주는 활동에 정성을 다하고 있습니다.
        </div>
      </div>
      <img class="img-wrap rounded-3xl md:w-2/3" src="/images/main/banner1.png" alt="classroom in africa">
    </div>
    <Mission class="hidden md:block mt-2 w-full">
      <div class="text-lg font-bold my-2">건강하고 행복한 국제사회 구현을 위한 우리의 역할</div>
      자신과 타인의 권리를 알고 지키기 위한 <span>인권/인성교육사업,</span><br>
      도움이 필요한 국내외 취약계층을 위한 <span>구호사업,</span><br>
      지속적인 기회와 재능및 교육을 제공하는 <span>재능지원사업,</span><br>
      국내외 열악한 환경개선및 다양한 서비스 지원을 위한 <span>환경개선사업</span>을 진행합니다.
    </Mission>
    <div class="grid auto-rows-min gap-4 md:grid-cols-2">
      <ImageWrap>
        <img src="https://live.staticflickr.com/6208/6151473085_be814718a0_c.jpg" alt="main" class="h-full object-cover">
      </ImageWrap>
      <Mission class="md:hidden">
        <div class="text-lg font-bold my-2">건강하고 행복한 국제사회 구현을 위한 우리의 역할</div>
        자신과 타인의 권리를 알고 지키기 위한 <span>인권/인성교육사업,</span><br>
        도움이 필요한 국내외 취약계층을 위한 <span>구호사업,</span><br>
        지속적인 기회와 재능및 교육을 제공하는 <span>재능지원사업,</span><br>
        국내외 열악한 환경개선및 다양한 서비스 지원을 위한 <span>환경개선사업</span>을 진행합니다.
      </Mission>

      <ImageWrap>
        <img src="/images/main/main-banner-2.png" alt="kids bucket list">
      </ImageWrap>
    </div>

</template>
<style scoped>

</style>
