<script setup lang="ts">
import { type BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/vue3';
import PlaceholderPattern from '../components/PlaceholderPattern.vue';

const breadcrumbs: BreadcrumbItem[] = [
  {
    title: 'Dashboard',
    href: '/dashboard'
  }
];
</script>

<template>
  <Head title="Dashboard" />
  <div class="flex h-full flex-1 flex-col gap-4 rounded-xl">
    <div class="grid auto-rows-min gap-4 md:grid-cols-2">
      <div
        class="relative aspect-video overflow-hidden rounded-xl border border-sidebar-border/70 dark:border-sidebar-border">
        <img src="/images/main/dream-main1.png" alt="main">
      </div>
      <div
        class="relative aspect-video overflow-hidden rounded-xl border border-sidebar-border/70 dark:border-sidebar-border">
        <img src="/images/main/dream-main2.png" alt="main">
      </div>

    </div>
    <div
      class="relative min-h-[100vh] flex-1 rounded-xl border border-sidebar-border/70 dark:border-sidebar-border md:min-h-min">
      <PlaceholderPattern />
    </div>
  </div>
</template>
