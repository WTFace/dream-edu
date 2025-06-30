<script setup>

import WangEditor from '@/components/WangEditor.vue';
import { useForm } from '@inertiajs/vue3';
import { eventBannerType } from '@/lib/utils.js';
import { Label } from '@/components/ui/label';
import InputError from '@/components/InputError.vue';
import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';

const form = useForm({
  title: '',
  body: '',
  type: null
});

function submit() {
  form.post(route('gallery.store'));
}
</script>

<template>
  <h2>겔러리 생성</h2>
  <form @submit.prevent="submit" enctype="multipart/form-data" class="space-y-4">
    <div>
      <Label class="mx-2">종류</Label>
      <select v-model="form.type">
        <option :value="key" v-for="(value, key) in eventBannerType">{{ value }}</option>
      </select>
      <InputError :message="form.errors.type" />
    </div>
    <div>
      <Label class="mx-2">제목</Label>
      <Input type="text" v-model="form.title" />
      <InputError :message="form.errors.title" />
    </div>
    <div>
      <WangEditor v-model:valueHtml="form.body" />
      <InputError :message="form.errors.body" />
    </div>

    <Button>저장</Button>
  </form>
</template>

<style scoped>

</style>