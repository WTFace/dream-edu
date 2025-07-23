<script setup>

import { Button } from '@/components/ui/button/index.js';
import { ref } from 'vue';
import Create from '@/components/banner/Create.vue';
import Modal from '@/components/Modal.vue';
import { closeEdit, deleteModel, eventBannerType, setModalData } from '@/lib/utils.js';
import Edit from '@/components/banner/Edit.vue';
import { showEdit } from '@/store.js';

const props = defineProps({
  banners: Array
});

const show = ref(false);
const close = () => {
  show.value = false;
};

</script>

<template>
  <div class="flex justify-start w-full gap-2">

    <h2>행사 배너 관리</h2>
    <Button @click="show = true" size="sm">추가</Button>
  </div>
  <table>
    <thead>
      <tr>
        <th>종류</th>
        <th>이미지</th>
        <th>관리</th>
      </tr>
    </thead>
    <tbody>
      <tr v-for="banner in banners">
        <td>{{ eventBannerType[banner.type] }}</td>
        <td>
          <img :src="banner.src" alt="" class="max-h-[400px]">
        </td>
        <td class="space-x-2">
          <Button variant="outline" @click="setModalData(banner)">수정</Button>
          <Button variant="destructive" @click="deleteModel(banner.id, 'banner')">삭제</Button>
        </td>
      </tr>
    </tbody>
  </table>

  <Modal :show="show" @close="close">
    <Create @close="close" />
  </Modal>
  <Modal :show="showEdit" @close="closeEdit">
    <Edit @close="closeEdit" />
  </Modal>
</template>

<style scoped>

</style>