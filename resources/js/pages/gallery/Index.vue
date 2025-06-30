<script setup>
import { Button } from '@/components/ui/button';
import { router } from '@inertiajs/vue3';

const props = defineProps({ data: Array });

const destroy = (id) => {
  const url = route('gallery.destroy', { gallery: id });
  confirm('delete this?') && router.delete(url);
};
</script>

<template>
  <Link :href="route('gallery.create')">글쓰기</Link>
  <div class="flex gap-4 flex-col md:flex-row">
    <div v-for="gallery in data.data" class="md:w-1/3" :key="gallery.id">
      <img :src="gallery.thumbnail" alt="">
      <div>{{ gallery.title }}</div>
      <div>
        {{ gallery.created_at }}
        <span class="ml-2 space-x-1">
          <Button variant="secondary">수정</Button>
          <Button @click="destroy(gallery.id)" variant="destructive">삭제</Button>
        </span>
      </div>
      <!--      <div v-html="gallery.body"></div>-->
    </div>
  </div>
</template>

<style scoped>

</style>