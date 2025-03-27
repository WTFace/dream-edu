<script setup lang="ts">
import AppHeader from '@/components/AppHeader.vue';
import AppShell from '@/components/AppShell.vue';
</script>

<template>
  <AppShell class="flex-col">
    <AppHeader />
    <main class="md:max-w-7xl mx-auto flex w-full h-full p-4 flex-1 flex-col gap-4 rounded-xl">
      <slot />
    </main>
    <SheetFooter class="p-4">
      <hr>
      footer ( 주소 및 연락처 등등 )
    </SheetFooter>
  </AppShell>
</template>
