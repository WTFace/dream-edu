<script setup>
import { onMounted, onUnmounted, watch } from 'vue';

const props = defineProps({
  show: {
    type: Boolean,
    default: false
  },
  closeable: {
    type: Boolean,
    default: true
  }
});

const emit = defineEmits(['close']);

watch(
  () => props.show,
  () => {
    if (props.show) {
      document.body.style.overflow = 'hidden';
    } else {
      document.body.style.overflow = null;
    }
  }
);

const close = () => {
  if (props.closeable) {
    emit('close');
  }
};

const closeOnEscape = (e) => {
  if (e.key === 'Escape' && props.show) {
    close();
  }
};

onMounted(() => document.addEventListener('keydown', closeOnEscape));

onUnmounted(() => {
  document.removeEventListener('keydown', closeOnEscape);
  document.body.style.overflow = null;
});
</script>

<template>
  <teleport to="body">
    <transition leave-active-class="duration-200">
      <div v-show="show" class="fixed inset-0 overflow-y-auto px-4 py-6 sm:px-0 z-50" scroll-region>
        <transition enter-active-class="ease-out duration-300" enter-from-class="opacity-0" enter-to-class="opacity-100"
                    leave-active-class="ease-in duration-200" leave-from-class="opacity-100" leave-to-class="opacity-0">
          <div v-show="show" class="fixed inset-0 transform transition-all" @click="close" @close="test">
            <div class="absolute inset-0 bg-neutral-500 dark:bg-neutral-900 opacity-75" />
          </div>
        </transition>
        <transition enter-active-class="ease-out duration-300"
                    enter-from-class="opacity-0 tranneutral-y-4 sm:tranneutral-y-0 sm:scale-95"
                    enter-to-class="opacity-100 tranneutral-y-0 sm:scale-100" leave-active-class="ease-in duration-200"
                    leave-from-class="opacity-100 tranneutral-y-0 sm:scale-100"
                    leave-to-class="opacity-0 tranneutral-y-4 sm:tranneutral-y-0 sm:scale-95">
          <div v-show="show"
               class="max-w-3xl p-6 mb-6 bg-neutral-100 dark:bg-neutral-900 rounded-lg overflow-hidden modal-shadow transform transition-all sm:w-full sm:mx-auto">
            <button class="absolute right-2 top-1" @click="close">
              <h1 class="hover:text-red-500 dark:text-white dark:hover:text-red-500">
                &times;
              </h1>
            </button>
            <slot v-if="show" />
          </div>
        </transition>
      </div>
    </transition>
  </teleport>
</template>

<style scoped>
.dark .modal-shadow {
  box-shadow: rgba(0, 0, 0, 0.25) 0px 0.0625em 0.0625em, rgba(0, 0, 0, 0.25) 0px 0.125em 0.5em, rgba(255, 255, 255, 0.1) 0px 0px 0px 1px inset;
}
</style>