<script setup>
import { usePreview } from '@/composables/usePreview.js';
import { router, useForm } from '@inertiajs/vue3';
import { eventBannerType } from '@/lib/utils.js';
import { Button } from '@/components/ui/button/index.js';
import InputError from '@/components/InputError.vue';
import { Label } from '@/components/ui/label/index.js';
import { ref } from 'vue';
import { Input } from '@/components/ui/input/index.js';
import WangEditor from '@/components/WangEditor.vue';
import { modalData } from '@/store.js';

const props = defineProps({ isAdmin: Boolean });

const { id, title, type, body } = modalData.value;
const form = useForm({
  title,
  type,
  body
});

const emit = defineEmits(['close']);
const { imagePreview, handleFileChange } = usePreview();

const errors = ref({});

function submit() {
  router.post(route('gallery.update', { gallery: id }), {
    _method: 'patch',
    title: form.title,
    body: form.body,
    type: form.type
  }, {
    onSuccess: (res) => {
      emit('close');
    }
  });

}
</script>

<template>
  <form v-if="isAdmin" @submit.prevent="submit" enctype="multipart/form-data" class="space-y-2 text-xs">
    <h1 class="w-full pb-3 text-center text-xl font-bold">수정</h1>
    <div>
      <Label class="mx-2">종류</Label>
      <select v-model="form.type" class="ml-2">
        <option :value="key" v-for="(value, key) in eventBannerType">{{ value }}</option>
      </select>
    </div>

    <div>
      <div class="flex items-center">
        <Label class="mx-2 w-8">제목</Label>
        <Input type="text" v-model="form.title" />
      </div>
      <InputError :message="form.errors.title" />
    </div>

    <div>
      <WangEditor v-model:valueHtml="form.body" />
      <InputError :message="form.errors.body" />
    </div>

    <Button>저장</Button>
  </form>
  <div v-else class="w-full px-6">
    <div class="p-2 text-xl">{{ title }}</div>
    <div v-html="body"></div>
  </div>
</template>

<style scoped></style>
