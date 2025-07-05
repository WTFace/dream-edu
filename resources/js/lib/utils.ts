import { type ClassValue, clsx } from 'clsx';
import { twMerge } from 'tailwind-merge';

export function cn(...inputs: ClassValue[]) {
    return twMerge(clsx(inputs));
}

export const eventBannerType = {
    silverClass: '청춘교실',
    youth: '청소년 육성',
    culture: '문화 교류',
    mind: '인성 교육'
};