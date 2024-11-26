<script setup>
import {ref, watch, onMounted, reactive} from 'vue';
import { useAudioPlayerStore } from '@/Stores/AudioPlayerStore'

/* store and tracking */
const audioPlayer = useAudioPlayerStore();
const audioDuration = ref(0.0);
const audioDurationCurrent = ref(
    (audioPlayer.audio)
        ? audioPlayer.audio.duration
        : 0.0
);

/* player procedures */
const updateTiming = (data) => {
    audioDurationCurrent.value = data.target.currentTime;
}


const preparePlayer = (delay) => {

    setTimeout(() => {
        audioDuration.value = audioPlayer.audio.duration;

        audioPlayer.audio.addEventListener("timeupdate", 
        (value) => {
            updateTiming(value);
        }
        );
    
        audioPlayer.audio.addEventListener("seeked", 
        (value) => {
            console.log("seeked");
            //if (audioPlayer.audio.autoturn) {
            //    audioPlayer.audio.next();
           // }
        }
        );
    }, delay);  
};

/* events */
onMounted(() => {
    if (audioPlayer.audio) {
        preparePlayer(0);
    }
});

watch(() => audioPlayer.audio, () => {
    preparePlayer(250);
});


</script>

<template>
    <div
        class="fixed bottom-0 left-0 right-0 bg-white border-b border-gray-100"
        v-show="audioPlayer.audio"
    >
        <div
            class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8"
        >
            
            <button @click="audioPlayer.prev()">&lt;</button>
            <button @click="audioPlayer.toggleTrack()">Toggle</button>
            <button @click="audioPlayer.next()">&gt;</button>

            <input 
                type="range"
                id=""
                :max="audioDuration"
                :value="audioDurationCurrent"
                min="0"
            >
        </div>
    </div>
</template>