<script setup>
import InputError from '@/components/InputError.vue';
import TextLink from '@/components/TextLink.vue';
import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import { Head, useForm } from '@inertiajs/vue3';
import { LoaderCircle } from 'lucide-vue-next';

const form = useForm({
  email: '',
  password: '',
  remember: false
});

const submit = () => {
  form.post(route('login'), {
    onFinish: () => form.reset('password')
  });
};
</script>
<script>
import AuthLayout from '@/layouts/AuthLayout.vue';

export default {
  layout: AuthLayout
};
</script>

<template>
  <Head title="Log in" />

  <form @submit.prevent="submit" class="flex flex-col gap-6">
    <div class="grid gap-6">
      <div class="grid gap-2">
        <Label for="email">이메일</Label>
        <Input
          id="email"
          type="email"
          required
          autofocus
          :tabindex="1"
          autocomplete="email"
          v-model="form.email"
        />
        <InputError :message="form.errors.email" />
      </div>

      <div class="grid gap-2">
        <div class="flex items-center justify-between">
          <Label for="password">비밀번호</Label>
          <TextLink :href="route('password.request')" class="text-sm" :tabindex="5">
            비밀번호 분실?
          </TextLink>
        </div>
        <Input
          id="password"
          type="password"
          required
          :tabindex="2"
          autocomplete="current-password"
          v-model="form.password"
        />
        <InputError :message="form.errors.password" />
      </div>

      <!--      <div class="flex items-center justify-between" :tabindex="3">-->
      <!--        <Label for="remember" class="flex items-center space-x-3">-->
      <!--          <Checkbox id="remember" v-model:checked="form.remember" :tabindex="4" />-->
      <!--          <span>Remember me</span>-->
      <!--        </Label>-->
      <!--      </div>-->

      <Button type="submit" class="mt-4 w-full" :tabindex="4" :disabled="form.processing">
        <LoaderCircle v-if="form.processing" class="h-4 w-4 animate-spin" />
        Log in
      </Button>
    </div>

    <!--    <div class="text-center text-sm text-muted-foreground">-->
    <!--      계정이 없다면-->
    <!--      <TextLink :href="route('register')" :tabindex="5">가입하기</TextLink>-->
    <!--    </div>-->
  </form>
  <hr>
  <!--  <SocialLogin />-->
</template>
