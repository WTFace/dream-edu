<script setup>
import { useForm } from '@inertiajs/vue3';
import { Input } from '@/components/ui/input/index.js';
import { Label } from '@/components/ui/label/index.js';
import InputError from '@/components/InputError.vue';
import { Button } from '@/components/ui/button/index.js';

const form = useForm({
  title: '',
  src: ''
});

function submit() {
  form.post(route('article.store'));
}
</script>

<template>
  <h2>
    언론보도 추가
  </h2>
  <form @submit.prevent="submit" class="space-y-2">
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