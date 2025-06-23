import { ref } from 'vue';

export function usePreview() {
    const imagePreview = ref(null);

    function handleFileChange(e) {
        const file = e.target.files[0];

        const reader = new FileReader();
        reader.onload = () => {
            imagePreview.value = reader.result;
        };
        reader.readAsDataURL(file);
    }

    return { imagePreview, handleFileChange };
}