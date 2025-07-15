<script setup>
Echo.channel('alert').listen('TestEvent', (e) => {
  console.log(e);
});
</script>

<template>
  test page
</template>

<style scoped>

</style>