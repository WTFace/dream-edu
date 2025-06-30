<script setup>
const props = defineProps({ data: Array });
console.log(props.data);
</script>

<template>
  <Link :href="route('gallery.create')">글쓰기</Link>
  <div>
    <div v-for="gallery in data.data">
      {{ gallery.title }}
      <div v-html="gallery.body"></div>
    </div>
  </div>
</template>

<style scoped>

</style>