<script setup>
import AudioPlayerBar from '@/Components/MusicPlayer/AudioPlayerBar.vue';
import { useAudioPlayerStore } from '@/Stores/AudioPlayerStore'

const audioPlayer = useAudioPlayerStore();

const props = defineProps({
    music: {
        type: Object,
        required: true
    }
});

const playAudio = () => {
    //AudioPlayerBar.startPlayer();
    audioPlayer.openAndPlay(props.music);
}

</script>

<template>
    <button
        class="inline-flex items-center rounded-md border border-transparent bg-green-600 px-4 py-2 text-xs font-semibold uppercase tracking-widest text-white transition duration-150 ease-in-out hover:bg-green-500 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 active:bg-green-700"
        @click="playAudio"
    >
        &#9654;
    </button>
</template>