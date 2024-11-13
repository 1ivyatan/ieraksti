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
        class="flex"
    >
        <div v-for="track in tracks.data">
            <VertMusicCard :music="track"/>
        </div>
    </div>
</template>