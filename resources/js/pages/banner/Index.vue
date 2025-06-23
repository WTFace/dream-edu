<script setup>

import { Button } from '@/components/ui/button/index.js';
import { ref } from 'vue';
import Create from '@/components/banner/Create.vue';
import Modal from '@/components/Modal.vue';
import { eventBannerType } from '@/lib/utils.js';

const props = defineProps({
  banners: Array
});

const show = ref(false);
const close = () => show.value = false;
</script>

<template>
  <h2>행사 배너 관리</h2>
  <Button @click="show = true">추가</Button>
  <table>
    <thead>
      <th>종류</th>
      <th>이미지</th>
      <th>관리</th>
    </thead>
    <tbody>
      <tr v-for="banner in banners">
        <td>{{ eventBannerType[banner.type] }}</td>
        <td>
          <img :src="banner.src" alt="" class="max-h-[400px]">
        </td>
        <td class="space-x-2">
          <Button variant="outline">수정</Button>
          <Button variant="destructive">삭제</Button>
        </td>
      </tr>
    </tbody>
  </table>

  <Modal :show="show" @close="close">
    <Create @close="close" />
  </Modal>
</template>

<style scoped>

</style>