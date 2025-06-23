<script setup>
import { usePreview } from '@/composables/usePreview.js';
import { reactive } from 'vue';

const props = defineProps({
  modalData: {
    type: Object,
    default: {}
  }
});

const input = reactive(props.modalData);

const { imagePreview, handleFileChange } = usePreview();

const errors = ref({});

</script>

<template>
  <h1 class="w-full pb-5 text-center text-xl font-bold">{{ isCreate ? '배너 만들기' : '배너 업데이트' }} {{ bannerType }}</h1>

  <form @submit.prevent="handleSubmit" enctype="multipart/form-data" class="space-y-4 text-xs">
    <div class="grid grid-cols-4 gap-x-1 gap-y-4">
      <div class="field-column !col-span-4 !grid-cols-4">
        <InputLabel value="파일" class="h-full" :isRequired="isCreate" />
        <DataWrap class="wrapper-height col-span-3 !justify-start px-2">
          <input type="file" accept="image/*" @change="handleFileChange" :required="isCreate" />
        </DataWrap>
      </div>
      <div class="field-column !col-span-4 !grid-cols-4">
        <DataWrap class="wrapper-height col-span-4 !h-auto !min-h-44 p-2">
          <img v-if="imagePreview" :src="imagePreview" alt="Selected Image" class="min-h-44 object-contain" />
          <div v-else>Image Preview</div>
        </DataWrap>
      </div>
      <div v-if="['cart', 'pcMenu', 'mobilMenu'].includes(bannerType)" class="field-column !col-span-4 !grid-cols-4">
        <InputLabel value="링크" class="h-full" />
        <DataWrap class="wrapper-height col-span-3">
          <InputText v-model="input.link" />
          <small class="error">{{ errors.link }}</small>
        </DataWrap>
      </div>
    </div>

    <div class="col-span-11 flex items-center justify-end gap-2">
      <MainButton type="submit">저장</MainButton>
    </div>
  </form>
</template>

<style scoped></style>
