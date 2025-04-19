<script setup lang="ts">
import AppHeader from '@/components/AppHeader.vue';
import AppShell from '@/components/AppShell.vue';
import { Mail, Phone, Printer } from 'lucide-vue-next';
</script>

<template>
  <AppShell class="flex-col">
    <AppHeader />
    <main class="container flex h-full flex-1 flex-col rounded-xl gap-2 md:gap-4 items-center">
      <slot />
    </main>
    <div class="text-sm text-gray-700 dark:text-gray-300 container leading-6">
      <div>
        <span class="text-md font-bold">(사) 국제드림교육원 </span> 고유번호 124-82-352-33 | 대표이사 고홍범
      </div>
      <div>
        (63110) 제주특별자치도 오광로6길 19, 1층 (이호이동)
      </div>
      <div>
        후원계좌: 농협 301-0366-8740-81
      </div>
      <div class="contact">
        <div>
          <component :is="Phone" class="inline w-4" />
          문의 064-700-0000 (평일09:30~17:30)
        </div>
        <div>
          <component :is="Printer" class="inline w-4" />
          팩스 050-4059-0811 <span class="ml-4"><component :is="Mail" class="inline w-4" /> idecenter@naver.com</span>
        </div>
      </div>
    </div>
  </AppShell>
</template>
<style scoped>
.contact {
  @apply md:flex gap-4 leading-6 pb-4
}

.container {
  @apply md:max-w-7xl mx-auto w-full p-4 gap-4;
}
</style>
