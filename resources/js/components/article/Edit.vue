<script setup>

import { Input } from '@/components/ui/input/index.js';
import { Button } from '@/components/ui/button/index.js';
import { Label } from '@/components/ui/label/index.js';
import InputError from '@/components/InputError.vue';
import { useForm } from '@inertiajs/vue3';
import { modalData } from '@/store.js';

const props = defineProps({ isAdmin: Boolean });

const { id, title, src } = modalData.value;
const form = useForm({
  title,
  src
});
const emit = defineEmits(['close']);

function submit() {
  form.patch(route('article.update', { article: id }), {
    onSuccess(res) {
      emit('close');
    }
  });
}
</script>

<template>
  <form v-if="isAdmin" @submit.prevent="submit" class="space-y-2">
    <div>
      <Label class="mx-2">제목</Label>
      <Input type="text" v-model="form.title" />
      <InputError :message="form.errors.title" />
    </div>
    <div>
      <Label class="mx-2">링크</Label>
      <Input type="text" v-model="form.src" />
      <InputError :message="form.errors.src" />
    </div>
    <Button>저장</Button>
  </form>
</template>

<style scoped>

</style>