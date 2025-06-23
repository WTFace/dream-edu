import { type ClassValue, clsx } from 'clsx';
import { twMerge } from 'tailwind-merge';

export function cn(...inputs: ClassValue[]) {
    return twMerge(clsx(inputs));
}

export const eventBannerType = {
    silverClass: '청춘교실',
    dummy: '테스트'
};