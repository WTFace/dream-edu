<script setup>
import { usePreview } from '@/composables/usePreview.js';
import { router, useForm } from '@inertiajs/vue3';
import { eventBannerType } from '@/lib/utils.js';
import { Button } from '@/components/ui/button/index.js';
import InputError from '@/components/InputError.vue';
import { Label } from '@/components/ui/label/index.js';
import { ref } from 'vue';
import { modalData } from '@/store.js';

const { id, type } = modalData.value;
const form = useForm({
  image: null,
  type
});

const emit = defineEmits(['close']);
const { imagePreview, handleFileChange } = usePreview();

const errors = ref({});

function submit() {
  router.post(`/banner/${id}`, {
    _method: 'patch',
    image: form.image,
    type: form.type
  }, {
    onSuccess: (res) => {
      emit('close');
    }
  });
}
</script>

<template>
  <h1 class="w-full pb-5 text-center text-xl font-bold">수정</h1>

  <form @submit.prevent="submit" enctype="multipart/form-data" class="space-y-4 text-xs">
    <div class="grid grid-cols-4 gap-x-1 gap-y-4">
      <div>
        <Label class="mx-2">종류</Label>
        <select v-model="form.type">
          <option :value="key" v-for="(value, key) in eventBannerType">{{ value }}</option>
        </select>
      </div>
      <div class="">
        <Label class="h-full">파일</Label>
        <input type="file" @input="form.image = $event.target.files[0]" accept="image/*" @change="handleFileChange" />
        <InputError :errors="errors.image" />
      </div>
      <div class="wrapper-height col-span-4 !h-auto !min-h-44 p-2">
        <img v-if="imagePreview" :src="imagePreview" alt="Selected Image" class="min-h-44 object-contain max-h-96" />
        <div v-else>Image Preview</div>
      </div>
    </div>

    <div class="flex items-center justify-end gap-2">
      <Button>저장</Button>
    </div>
  </form>
</template>

<style scoped></style>
