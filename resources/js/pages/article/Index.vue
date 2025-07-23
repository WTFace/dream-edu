<script setup>
import Pagination from '@/components/Pagination.vue';
import { Button } from '@/components/ui/button/index.js';
import { usePage } from '@inertiajs/vue3';
import { closeEdit, deleteModel, setModalData } from '@/lib/utils.js';
import { showEdit } from '@/store.js';
import Edit from '@/components/article/Edit.vue';
import Modal from '@/components/Modal.vue';

const props = defineProps({ data: Array });
const isAdmin = usePage().props.auth.user?.admin;
</script>

<template>
  <div class="flex justify-start w-full gap-2">
    <h2>언론보도</h2>
    <Button v-if="isAdmin" size="sm">
      <Link :href="route('article.create')">글쓰기</Link>
    </Button>
  </div>

  <div v-for="article in data.data" :key="article.id" class="flex w-2/5 justify-between">
    <a class="my-2 font-semibold" :href="article.src" target="_blank">
      <div>
        {{ article.title }}
      </div>
    </a>
    <div class="inline-flex">
      <Button v-if="isAdmin" size="sm" variant="outline" @click="setModalData(article)">수정</Button>
      <Button v-if="isAdmin" size="sm" variant="destructive" @click="deleteModel(article.id, 'article')">삭제</Button>
    </div>
  </div>

  <div v-if="data.data.length > 0" class="my-4">
    <Pagination :links="data.links" class="mt-4" />
  </div>

  <Modal :show="showEdit" @close="closeEdit">
    <Edit @close="closeEdit" :isAdmin="isAdmin" />
  </Modal>
</template>

<style scoped>

</style>