<script setup lang="ts">
import InputError from '@/components/InputError.vue';
import TextLink from '@/components/TextLink.vue';
import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import { Head, useForm } from '@inertiajs/vue3';
import { LoaderCircle } from 'lucide-vue-next';

const form = useForm({
  name: '',
  email: '',
  password: '',
  password_confirmation: ''
});

const submit = () => {
  form.post(route('register'), {
    onFinish: () => form.reset('password', 'password_confirmation')
  });

};
</script>
<script lang="ts">
import AuthLayout from '@/layouts/AuthLayout.vue';

export default {
  layout: AuthLayout
};
</script>

<template>
  <Head title="Register" />

  <form @submit.prevent="submit" class="flex flex-col gap-6">
    <div class="grid gap-6">

      <div class="grid gap-2">
        <Label for="email">이메일</Label>
        <Input id="email" type="email" required :tabindex="2" autocomplete="email" v-model="form.email" />
        <InputError :message="form.errors.email" />
      </div>

      <div class="grid gap-2">
        <Label for="password">비밀번호</Label>
        <Input
          id="password"
          type="password"
          required
          :tabindex="3"
          autocomplete="new-password"
          v-model="form.password"
        />
        <InputError :message="form.errors.password" />
      </div>

      <div class="grid gap-2">
        <Label for="password_confirmation">비밀번호 확인</Label>
        <Input
          id="password_confirmation"
          type="password"
          required
          :tabindex="4"
          autocomplete="new-password"
          v-model="form.password_confirmation"
        />
        <InputError :message="form.errors.password_confirmation" />
      </div>

      <Button type="submit" class="mt-2 w-full" tabindex="5" :disabled="form.processing">
        <LoaderCircle v-if="form.processing" class="h-4 w-4 animate-spin" />
        등록
      </Button>
    </div>

    <div class="text-center text-sm text-muted-foreground">
      이미 가입하셨나요?
      <TextLink :href="route('login')" class="underline underline-offset-4" :tabindex="6">Log in</TextLink>
    </div>
  </form>

  <hr>
  <div>
    <h3>간편 가입</h3>
    <div class="flex items-center mt-2">
      <a href="/social-redirect/naver" class="size-10">
        <img src="/images/naver.png" alt="naver">
      </a>
    </div>
  </div>
</template>
