<script setup>
import {ref, watch, onMounted} from 'vue';
import { useCounterStore } from '@/Stores/AudioPlayerStore'

const counter = useCounterStore()

import { useAudioUrlStore } from '@/Stores/AudioPlayerStore'

const audiourl = useAudioUrlStore();


</script>

<template>
    <div
        class="fixed bottom-0 left-0 right-0 bg-white border-b border-gray-100"
    >
        <div
            class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8"
        >

            <button @click="counter.increment()">
                {{ counter.count }}
            </button>

            <input type="button" :value="audiourl.audiourl">

            <p>{{ audiourl.audiourl }}</p>
        
        </div>

        <audio controls :id="test">
            <source :src="audiourl.audiourl" type="audio/mpeg">
        Your browser does not support the audio element.
        </audio> 
    </div>
</template>