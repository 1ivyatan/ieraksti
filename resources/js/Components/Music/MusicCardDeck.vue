<script setup>
import VertMusicCard from '@/Components/Music/VertMusicCard.vue';

const props = defineProps({
    tracks: {
        type: Object,
        required: true
    }
});
</script>

<template>
    <div
        class="flex flex-wrap justify-items-center gap-x-2 gap-y-2"
    >
        <div v-for="track in tracks.data">
            <VertMusicCard :music="track"/>
        </div>
    </div>
</template>