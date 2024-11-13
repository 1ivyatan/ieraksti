<script setup>
import { Head, } from '@inertiajs/vue3';
import WithSidebarSearchLayout from '@/Layouts/WithSidebarSearchLayout.vue';

const props = defineProps({
    tracks: {
        type: Object,
        required: true
    }
});
</script>

<template>
    <Head title="Tracks" />
    <WithSidebarSearchLayout>
        {{ tracks }}
    </WithSidebarSearchLayout>
</template>