<script setup>
import { Button } from '@/components/ui/button';
import { usePage } from '@inertiajs/vue3';
import { closeEdit, deleteModel, setModalData } from '@/lib/utils.js';
import { showEdit } from '@/store.js';
import Pagination from '@/components/Pagination.vue';
import Modal from '@/components/Modal.vue';
import Edit from '@/components/gallery/Edit.vue';

const props = defineProps({ data: Array });
const isAdmin = usePage().props.auth.user?.admin;

</script>

<template>
  <div class="flex justify-start w-full gap-2">
    <h2 class="">Gallery</h2>
    <Button v-if="isAdmin" size="sm">
      <Link :href="route('gallery.create')">글쓰기</Link>
    </Button>
  </div>

  <div class="flex gap-8 flex-col md:flex-row flex-wrap mt-4">
    <div v-for="gallery in data.data" :key="gallery.id" class="text-center">
      <div @click="setModalData(gallery)" class="cursor-pointer">
        <img :src="gallery.thumbnail" alt="thumbnail" class="w-96 h-72 object-contain">
        <div class="my-2">{{ gallery.title }}</div>
      </div>
      <div>
        {{ gallery.created_at }}
        <span class="ml-4" v-if="isAdmin">
          <Button size="sm" @click="deleteModel(gallery.id, 'gallery')" variant="destructive">삭제</Button>
        </span>
      </div>
      <!--      <div v-html="gallery.body"></div>-->
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