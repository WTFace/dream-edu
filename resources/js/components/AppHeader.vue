<script setup lang="ts">
import Breadcrumbs from '@/components/Breadcrumbs.vue';
import { Avatar, AvatarFallback } from '@/components/ui/avatar';
import { Button } from '@/components/ui/button';
import { DropdownMenu, DropdownMenuContent, DropdownMenuTrigger } from '@/components/ui/dropdown-menu';
import { NavigationMenu, NavigationMenuItem, NavigationMenuList } from '@/components/ui/navigation-menu';
import { Sheet, SheetContent, SheetHeader, SheetTitle, SheetTrigger } from '@/components/ui/sheet';
import UserMenuContent from '@/components/UserMenuContent.vue';
import type { BreadcrumbItem } from '@/types';
import { usePage } from '@inertiajs/vue3';
import { Menu, UserSearch } from 'lucide-vue-next';
import { computed, ref } from 'vue';
import AppearanceTabs from '@/components/AppearanceTabs.vue';
import AppLogo from '@/components/AppLogo.vue';

interface Props {
  breadcrumbs?: BreadcrumbItem[];
}

const props = withDefaults(defineProps<Props>(), {
  breadcrumbs: () => []
});

const page = usePage();
const auth = computed(() => page.props.auth);
const logo = page.props.logo;

const isCurrentRoute = computed(() => (url: string) => {
  if (page.url === '/') {
    return url === '/';
  }
  return page.url.startsWith(url);
});

const activeItemStyles = computed(
  () => (url: string) => (isCurrentRoute.value(url) ? 'dark:border-teal-100 border-b-2 border-gray-400 dark:bg-neutral-800 dark:text-neutral-100' : '')
);

const mainNavItems = [
  {
    title: '봉사활동', path: '/support', subMenu: [
      { title: '취약계층 지원', link: '/pwd' },
      { title: '노인복지 지원', link: '/senior' },
      { title: '해외봉사 지원', link: '/overseas' },
      { title: '녹색환경,어린이 지킴이', link: '/safety' }
    ]
  },
  {
    title: '교육활동', path: '/education', subMenu: [
      { title: '청소년 육성', link: '/youth' },
      { title: '문화 교류', link: '/culture' },
      { title: '인성 교육', link: '/mind' },
      { title: '책사랑도우미', link: '/book' }
    ]
  },
  {
    title: '후원', path: '/donation', subMenu: [
      { title: '후원안내', link: '/guide' },
      { title: '자주하는 질문', link: '/faq' }
    ]
  },
  {
    title: '청춘교실', path: '/silver', subMenu: []
  },
  {
    title: '소식', path: '/footprint', subMenu: [
      { title: '언론보도', link: '/article' },
      { title: '소식지', link: '/note' },
      { title: '갤러리', link: '/gallery' }
    ]
  }
];
const dialogOpen = ref();
const closeDialog = () => {
  dialogOpen.value = false;
};
</script>

<template>
  <div>
    <div class="border-b border-sidebar-border/80">
      <div class="mx-auto flex h-16 items-center px-4 md:max-w-7xl">
        <!-- Mobile Menu -->
        <div class="lg:hidden flex">
          <Sheet v-model:open="dialogOpen">
            <SheetTrigger :as-child="true">
              <Button variant="ghost" size="icon" class="mr-2 h-9 w-9">
                <Menu class="h-5 w-5" />
              </Button>
            </SheetTrigger>
            <SheetContent side="left" class="w-[300px] p-6">
              <SheetTitle class="sr-only">Navigation Menu</SheetTitle>
              <SheetHeader class="flex justify-start text-left">

              </SheetHeader>
              <div class="flex h-full flex-1 flex-col justify-between space-y-4 py-6">
                <nav class="-mx-3 space-y-1">
                  <NavigationMenuItem v-for="(item, index) in mainNavItems" :key="index" :subMenu="item.subMenu"
                                      @closeDialog="closeDialog"
                                      :path="item.path"
                                      :class="[ activeItemStyles(`${item.path}`), ' cursor-pointer']">
                    <div v-if="item.subMenu.length">
                      {{ item.title }}
                    </div>
                    <div v-else>
                      <Link :href="item.path">{{ item.title }}</Link>
                    </div>
                  </NavigationMenuItem>
                </nav>
                <div class="flex flex-col space-y-4">
                </div>
              </div>
            </SheetContent>
          </Sheet>
          <div>
            <AppLogo :logo="logo" />
          </div>
        </div>

        <!-- Desktop Menu -->
        <div class="hidden h-full lg:flex lg:flex-1 items-center">
          <AppLogo :logo="logo" />
          <NavigationMenu class="ml-10 flex h-full items-stretch">
            <NavigationMenuList class="flex h-full items-stretch space-x-2">
              <NavigationMenuItem v-for="(item, index) in mainNavItems" :key="index" :subMenu="item.subMenu"
                                  :path="item.path">
                <div :class="[ activeItemStyles(item.path), 'cursor-pointer']">
                  <div v-if="item.subMenu.length">
                    {{ item.title }}
                  </div>
                  <div v-else>
                    <Link :href="item.path">{{ item.title }}</Link>
                  </div>
                </div>
              </NavigationMenuItem>
            </NavigationMenuList>
          </NavigationMenu>
        </div>

        <div class="ml-auto flex items-center space-x-2">
          <AppearanceTabs />
          <DropdownMenu v-if="auth.user">
            <DropdownMenuTrigger :as-child="true">
              <Button
                variant="ghost"
                size="icon"
                class="relative size-10 w-auto rounded-full p-1 focus-within:ring-2 focus-within:ring-primary"
              >
                <Avatar class="size-8 overflow-hidden rounded-full">

                  <AvatarFallback
                    class="rounded-lg bg-neutral-200 font-semibold text-black dark:bg-neutral-700 dark:text-white">
                    <component :is="UserSearch" class="-ml-1 h-4 w-4" />
                  </AvatarFallback>
                </Avatar>
              </Button>
            </DropdownMenuTrigger>
            <DropdownMenuContent align="end" class="w-56">
              <UserMenuContent :user="auth.user" />
            </DropdownMenuContent>
          </DropdownMenu>

          <DropdownMenu v-if="auth.user?.admin">
            <DropdownMenuTrigger :as-child="true">
              <Button variant="ghost" size="icon" class="relative size-10 w-auto p-1">
                관리
              </Button>
            </DropdownMenuTrigger>
            <DropdownMenuContent align="end" class="w-56 flex flex-col p-2">
              <Link :href="route('banner')">행사</Link>
              <Link :href="route('logo')">로고</Link>
            </DropdownMenuContent>
          </DropdownMenu>

        </div>
      </div>
    </div>

    <div v-if="props.breadcrumbs.length > 1" class="flex w-full border-b border-sidebar-border/70">
      <div class="mx-auto flex h-12 w-full items-center justify-start px-4 text-neutral-500 md:max-w-7xl">
        <Breadcrumbs :breadcrumbs="breadcrumbs" />
      </div>
    </div>
  </div>
</template>
<style scoped>
.auth {
  @apply inline-block rounded-sm border px-2 p-1 text-sm leading-normal text-[#1b1b18] hover:border-[#1915014a] dark:border-[#3E3E3A] dark:text-[#EDEDEC] dark:hover:border-[#62605b]
}
</style>
