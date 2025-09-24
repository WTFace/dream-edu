<script setup>

import { Mail, Phone, Printer } from 'lucide-vue-next';
import { usePage } from '@inertiajs/vue3';
import banner01 from '@images/footer/banner01.gif';
import banner02 from '@images/footer/banner02.gif';
import banner03 from '@images/footer/banner03.gif';
import banner04 from '@images/footer/banner04.gif';
import banner05 from '@images/footer/banner05.gif';
import banner06 from '@images/footer/banner06.gif';
import banner07 from '@images/footer/banner07.gif';

const page = usePage();
const { companyName, companyId, address, ceo, bank, contact, fax, email } = page.props.footer;
</script>

<template>
  <div class="flex flex-wrap justify-center">
    <div class="inline-flex">
      <a href="https://www.moef.go.kr/" target="_blank">
        <img :src="banner01" alt="기획재정부">
      </a>
      <a href="https://www.nts.go.kr/" target="_blank">
        <img :src="banner02" alt="국세청">
      </a>
      <a href="https://www.jejusi.go.kr/index.ac" target="_blank">
        <img :src="banner06" alt="제주시">
      </a>
    </div>
    <div class="inline-flex">
      <a href="https://www.seogwipo.go.kr/index.htm" target="_blank">
        <img :src="banner05" alt="서귀포시">
      </a>
      <a href="https://www.jje.go.kr/" target="_blank">
        <img :src="banner04" alt="제주특별자치도교육청">
      </a>
    </div>
    <div class="inline-flex">
      <a href="https://www.jeju.go.kr/index.htm" target="_blank">
        <img :src="banner03" alt="제주특별자치도">
      </a>
      <a href="https://www.acrc.go.kr/" target="_blank">
        <img :src="banner07" alt="국민권익위원회">
      </a>
    </div>

  </div>
  <div class="text-sm text-gray-700 dark:text-gray-300 container leading-6">
    <div>
      <span class="text-md font-bold">{{ companyName }} </span> {{ companyId }} | {{ ceo }}
    </div>
    <div>
      {{ address }}
    </div>
    <div>
      {{ bank }}
    </div>
    <div class="contact">
      <div>
        <component :is="Phone" class="inline w-4" />
        문의 {{ contact }}
      </div>
      <div>
        <component :is="Printer" class="inline w-4" />
        팩스 {{ fax }} <span class="ml-4"><component :is="Mail" class="inline w-4" /> {{ email }}</span>
      </div>
    </div>
  </div>
</template>

<style scoped>
.contact {
  @apply md:flex gap-4 leading-6 pb-4
}
</style>