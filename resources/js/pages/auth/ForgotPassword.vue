<script setup>
import InputError from '@/components/InputError.vue';
import TextLink from '@/components/TextLink.vue';
import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import { Head, useForm } from '@inertiajs/vue3';
import { LoaderCircle } from 'lucide-vue-next';

const form = useForm({
  email: ''
});

const submit = () => {
  form.post(route('password.email'));
};
</script>
<script>
import AuthLayout from '@/layouts/AuthLayout.vue';

export default {
  layout: AuthLayout
};
</script>

<template>
  <Head title="Forgot password" />

  <div class="space-y-6">
    <form @submit.prevent="submit">
      <div class="grid gap-2">
        <Label for="email">Email</Label>
        <Input id="email" type="email" name="email" autocomplete="off" v-model="form.email" autofocus
               placeholder="email@example.com" />
        <InputError :message="form.errors.email" />
      </div>

      <div class="my-6 flex items-center justify-start">
        <Button class="w-full" :disabled="form.processing">
          <LoaderCircle v-if="form.processing" class="h-4 w-4 animate-spin" />
          변경링크 발송
        </Button>
      </div>
    </form>

    <div class="space-x-1 text-center text-sm text-muted-foreground">
      <span>Or, return to</span>
      <TextLink :href="route('login')">log in</TextLink>
    </div>
  </div>
</template>
