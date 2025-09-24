<script setup lang="ts">
import AppHeader from '@/components/AppHeader.vue';
import AppShell from '@/components/AppShell.vue';
import Footer from '@/components/Footer.vue';
</script>

<template>
  <AppShell class="flex-col">
    <AppHeader />
    <main class="container flex h-full flex-1 flex-col rounded-xl gap-2 md:gap-4 items-center">
      <slot />
    </main>
    <Footer />

  </AppShell>
</template>
<style scoped>

</style>
