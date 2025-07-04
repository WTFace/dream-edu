<script setup>
import { usePreview } from '@/composables/usePreview.js';
import { Label } from '@/components/ui/label/index.js';
import InputError from '@/components/InputError.vue';

defineProps(['form']);
const { imagePreview, handleFileChange } = usePreview();
</script>

<template>
  <div>
    <Label class="h-full">파일</Label>
    <input type="file" @input="form.image = $event.target.files[0]" accept="image/*" @change="handleFileChange" />
    <InputError :errors="form.errors.image" />
  </div>
  <div class="wrapper-height col-span-4 !h-auto !min-h-44 p-2">
    <img v-if="imagePreview" :src="imagePreview" alt="Selected Image" class="min-h-44 object-contain max-h-96" />
    <div v-else>Image Preview</div>
  </div>
</template>

<style scoped>

</style>