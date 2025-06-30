<script setup>
import { useQuery } from '@/composables/useQuery.js';

const { query } = useQuery();
defineProps({ links: Array });
let queryStr = '';
for (const [k, v] of Object.entries(query)) {
  if (k === 'page' || v === null) continue;
  queryStr += `&${k}=${v}`;
}

const customLabel = (link) => {
  if (link.label === '&laquo; Previous') {
    return '이전';
  } else if (link.label === 'Next &raquo;') {
    return '다음';
  } else {
    return link.label;
  }
};
</script>

<template>
  <div class="flex items-center gap-1">
    <Component :is="link.url ? 'Link' : 'span'" v-for="link in links" :class="{
      'text-secondary': !link.url,
      'active ': link.active,
    }" :href="link.url + queryStr" class="cursor-pointer" v-html="customLabel(link)" />
  </div>
</template>

<style scoped>
.active {
  @apply font-bold bg-gradient-to-b border border-primary;
}

a {
  @apply border border-muted py-1 px-3 rounded-lg hover:text-primary hover:border-primary transition-all duration-300 ease-in-out;
}

a:first-child,
a:last-child,
span {
  @apply p-2
}

span:hover {
  @apply text-primary transition-all duration-300 ease-in-out;
}

.dark .active {
  @apply border border-primary;
}
</style>
