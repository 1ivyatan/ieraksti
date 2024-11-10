<script setup>
import {ref, watch, onMounted} from 'vue';
import { useCounterStore } from '@/Stores/AudioPlayerStore'

const counter = useCounterStore()

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
        
        </div>

        <audio controls>
            <source src="https://upload.wikimedia.org/wikipedia/commons/5/5c/XC707075_-_European_Herring_Gull_-_Larus_argentatus.mp3" type="audio/mpeg">
        Your browser does not support the audio element.
        </audio> 
    </div>
</template>