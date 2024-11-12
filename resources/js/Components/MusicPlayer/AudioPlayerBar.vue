<script setup>
import {ref, watch, onMounted} from 'vue';
import { useAudioPlayerStore } from '@/Stores/AudioPlayerStore'

const audioPlayer = useAudioPlayerStore();
const playerBarPresent = ref(false);

onMounted(() => {

});

</script>

<template>
    <div
        class="fixed bottom-0 left-0 right-0 bg-white border-b border-gray-100"
        v-show="playerBarPresent"
    >
        <div
            class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8"
        >
            {{ audioPlayer.audio }}
        </div>
    </div>
</template>