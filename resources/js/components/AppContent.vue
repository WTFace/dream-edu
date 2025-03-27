<script setup lang="ts">
import { SidebarInset } from '@/components/ui/sidebar';
import { computed } from 'vue';

interface Props {
  variant?: 'header' | 'sidebar';
  class?: string;
}

const props = defineProps<Props>();
const className = computed(() => props.class);
</script>

<template>
  <SidebarInset v-if="props.variant === 'sidebar'" :class="className">
    <slot />
  </SidebarInset>
  <main v-else class="md:max-w-7xl mx-auto flex w-full h-full p-4 flex-1 flex-col gap-4 rounded-xl"
        :class="className">
    <slot />
  </main>
  <SheetFoo class="p-4">footer
  </SheetFoo>
</template>
<style scoped>
.container {
}
</style>
