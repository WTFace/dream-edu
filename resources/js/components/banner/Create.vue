<script setup>
import { usePreview } from '@/composables/usePreview.js';
import { ref } from 'vue';
import { Button } from '@/components/ui/button/index.js';
import { useForm } from '@inertiajs/vue3';
import InputError from '@/components/InputError.vue';
import { Label } from '@/components/ui/label/index.js';

const form = useForm({
  image: null,
  type: 'silverClass'
});
const emit = defineEmits(['close']);

const { imagePreview, handleFileChange } = usePreview();

const errors = ref({});

function submit() {
  form.post(route('banner.create'), {
    onFinish: () => {
      emit('close');
    }
  });
}

</script>

<template>
  <h1 class="w-full pb-5 text-center text-xl font-bold">{{ '생성' }}</h1>

  <form @submit.prevent="submit" enctype="multipart/form-data" class="space-y-4 text-xs">
    <div class="grid grid-cols-4 gap-x-1 gap-y-4">
      <div class="">
        <Label value="파일" class="h-full" />
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
