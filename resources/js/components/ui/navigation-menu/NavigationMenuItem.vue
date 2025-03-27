<script setup>
import { ref } from 'vue';

defineProps(['subMenu']);
const isHover = ref(false);
</script>

<template>
  <div @mouseover="isHover = true" @mouseleave="isHover = false"
       class="relative flex h-full items-center" :class="`${isHover ? 'show-sub' : 'hide-sub'}`">
    <slot />
    <ul
      v-if="subMenu"
      class="sub-menu absolute left-0 top-14 z-10 flex w-auto min-w-40 flex-col bg-header-label transition-opacity duration-200 ease-in-out bg-neutral-100 p-1 dark:bg-neutral-800">
      <Link v-for="(sub, index) in subMenu" :key="index" :href='sub.link'
            class="bg-header-label px-3 py-1.5 text-header-data transition-all duration-200 ease-in-out border-b-amber-600 hover:scale-110">
        {{ sub.title }}
      </Link>
    </ul>
  </div>
</template>
<style scoped>
.show-sub .sub-menu {
  @apply visible opacity-100;
}

.hide-sub .sub-menu {
  @apply invisible opacity-0;
}
</style>
