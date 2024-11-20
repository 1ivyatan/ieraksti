<script setup>
import { usePage } from '@inertiajs/vue3';


const props = defineProps({
    
});

const huh = axios.get(route('user.musiclist.show', {
    id: usePage().props.auth.user.id,
}));
</script>

<template>
    
</template>