<script setup>
import { Button } from '@/components/ui/button/index.js';
import { useForm } from '@inertiajs/vue3';
import { Label } from '@/components/ui/label/index.js';
import { eventBannerType } from '@/lib/utils.js';
import ImageUpload from '@/components/ImageUpload.vue';

const form = useForm({
  image: null,
  type: 'silverClass'
});
const emit = defineEmits(['close']);

function submit() {
  form.post(route('banner.store'), {
    onFinish: () => {
      emit('close');
    }
  });
}

</script>

<template>
  <h1 class="w-full pb-5 text-center text-xl font-bold">생성 </h1>

  <form @submit.prevent="submit" enctype="multipart/form-data" class="space-y-4 text-xs">
    <div class="grid grid-cols-4 gap-x-1 gap-y-4">
      <div>
        <Label class="mx-2">종류</Label>
        <select v-model="form.type">
          <option :value="key" v-for="(value, key) in eventBannerType">{{ value }}</option>
        </select>
      </div>
      <ImageUpload :form="form" />
    </div>

    <div class="flex items-center justify-end gap-2">
      <Button>저장</Button>
    </div>
  </form>
</template>

<style scoped></style>
