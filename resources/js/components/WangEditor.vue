<script setup>
import '@wangeditor/editor/dist/css/style.css';
import { Editor, Toolbar } from '@wangeditor/editor-for-vue';
import { i18nChangeLanguage } from '@wangeditor/editor';
import { onBeforeUnmount, ref, shallowRef, watch } from 'vue';

i18nChangeLanguage('en');

const props = defineProps({
  valueHtml: {
    type: String,
    default: ''
  },
  disableImage: {
    type: Boolean,
    default: false
  }
});

const emit = defineEmits(['update:valueHtml']);

const editorRef = shallowRef(null);
const innerValueHtml = ref(props.valueHtml);

const toolbarConfig = {
  excludeKeys: ['group-more-style', 'blockquote', 'group-video', 'fullScreen', 'fontFamily', 'lineHeight', 'divider',
    'codeBlock', 'insertImage', props.disableImage && 'group-image']
};

const uploadImageOption = props.disableImage
  ? {}
  : {
    base64LimitSize: 1 * 1024 * 1024,
    customUpload: async (file, insertFn) => {
      const reader = new FileReader();
      reader.readAsDataURL(file);
      reader.onload = () => {
        const base64String = reader.result;
        insertFn(base64String);
      };
    }
  };

const editorConfig = {
  autoFocus: false,
  MENU_CONF: {
    uploadImage: uploadImageOption
  }
};

watch(
  () => props.valueHtml,
  (newVal) => {
    innerValueHtml.value = newVal;
  },
  { immediate: true }
);

watch(innerValueHtml, (newValue) => {
  emit('update:valueHtml', newValue);
});

onBeforeUnmount(() => {
  const editor = editorRef.value;
  if (editor == null) return;
  editor.destroy();
});

const handleCreated = (editor) => {
  editorRef.value = editor;
};
</script>

<template>
  <div style="border: 1px solid #ccc">
    <Toolbar :editor="editorRef" :defaultConfig="toolbarConfig" style="border-bottom: 1px solid #ccc" />
    <Editor :defaultConfig="editorConfig" v-model="innerValueHtml" style="height: 560px" @onCreated="handleCreated" />
  </div>
</template>

<style scoped></style>
