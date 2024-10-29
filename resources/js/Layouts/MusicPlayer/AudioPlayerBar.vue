<script setup>
import {ref, watch, onMounted} from 'vue';
import {store} from "./Player.js";
</script>

<template>
    <div
        class="fixed bottom-0 left-0 right-0 bg-white border-b border-gray-100"
    >
        <div
            class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8"
        >
        <button @click="store.increment()">
          {{ store.count }}
        </button>
        </div>
    </div>
</template>