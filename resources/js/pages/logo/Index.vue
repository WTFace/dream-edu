<script setup>

import ImageUpload from '@/components/ImageUpload.vue';
import { useForm } from '@inertiajs/vue3';
import { Button } from '@/components/ui/button/index.js';

const form = useForm({
  image: null,
  type: 'logo'
});

function submit() {
  form.post(route('logo.store'), {});
}
</script>

<template>
  <form @submit.prevent="submit" enctype="multipart/form-data" class="space-y-4 text-xs">
    <div class="grid grid-cols-4 gap-x-1 gap-y-4">
      <ImageUpload :form="form" />
    </div>

    <div class="flex items-center justify-start gap-2">
      <Button>저장</Button>
      <Transition class="transition ease-in-out" enter-from-class="opacity-0" leave-to-class="opacity-0">
        <p v-if="form.recentlySuccessful"
           class="p-2 font-bold text-xl text-green-600 rounded-md">
          success </p>
      </Transition>
    </div>
  </form>
</template>

<style scoped>

</style>