import { type ClassValue, clsx } from 'clsx';
import { twMerge } from 'tailwind-merge';
import { router } from '@inertiajs/vue3';
import { modalData, showEdit } from '../store';

export function cn(...inputs: ClassValue[]) {
    return twMerge(clsx(inputs));
}

export const eventBannerType = {
    silverClass: '청춘교실',
    youth: '청소년 육성',
    culture: '문화 교류',
    mind: '인성 교육'
};

export const deleteModel = (id, model) => {
    const url = route(`${model}.destroy`, { [model]: id });
    confirm('delete this?') && router.delete(url);
};

export const setModalData = (data) => {
    modalData.value = data;
    showEdit.value = true;
};

export const closeEdit = () => {
    showEdit.value = false;
};