<script setup>
import { Head, } from '@inertiajs/vue3';
import WithSidebarSearchLayout from '@/Layouts/WithSidebarSearchLayout.vue';
import MusicCardDeck from '@/Components/Music/MusicCardDeck.vue';

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
        <MusicCardDeck :tracks="tracks"/>
        {{ tracks }}
    </WithSidebarSearchLayout>
</template>