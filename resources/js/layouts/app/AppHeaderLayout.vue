<script setup lang="ts">
import AppHeader from '@/components/AppHeader.vue';
import AppShell from '@/components/AppShell.vue';
import { Mail, Phone, Printer } from 'lucide-vue-next';
import { usePage } from '@inertiajs/vue3';

const page = usePage();
const { companyName, companyId, address, ceo, bank, contact, fax, email } = page.props.footer;
</script>

<template>
  <AppShell class="flex-col">
    <AppHeader />
    <main class="container flex h-full flex-1 flex-col rounded-xl gap-2 md:gap-4 items-center">
      <slot />
    </main>
    <div class="text-sm text-gray-700 dark:text-gray-300 container leading-6">
      <div>
        <span class="text-md font-bold">{{ companyName }} </span> {{ companyId }} | {{ ceo }}
      </div>
      <div>
        {{ address }}
      </div>
      <div>
        {{ bank }}
      </div>
      <div class="contact">
        <div>
          <component :is="Phone" class="inline w-4" />
          문의 {{ contact }}
        </div>
        <div>
          <component :is="Printer" class="inline w-4" />
          팩스 {{ fax }} <span class="ml-4"><component :is="Mail" class="inline w-4" /> {{ email }}</span>
        </div>
      </div>
    </div>
  </AppShell>
</template>
<style scoped>
.contact {
  @apply md:flex gap-4 leading-6 pb-4
}

.container {
  @apply md:max-w-7xl mx-auto w-full p-4 gap-4;
}
</style>
