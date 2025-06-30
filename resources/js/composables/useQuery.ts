import { usePage } from '@inertiajs/vue3';

export const useQuery = () => {
    const query = usePage().props.ziggy.query;
    return { query };
};