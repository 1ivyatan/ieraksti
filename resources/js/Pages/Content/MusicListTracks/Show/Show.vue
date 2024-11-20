<script setup>
import { usePage } from '@inertiajs/vue3';


const props = defineProps({
    
});

const huh = usePage().props.auth.user//axios.get(route('user.musiclist.show', {
    //id: ,
//}));
</script>

<template>
    {{ huh }}
</template>