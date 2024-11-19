<script setup>
import MusicMenuButtons from '@/Components/Music/MusicMenuButtons/MusicMenuButtons.vue';
import Cover from '../Cover/Cover.vue';

const props = defineProps({
    music: {
        type: Object,
        required: true
    }
});
</script>

<template>
    <div class="bg-white p-4 shadow sm:rounded-lg sm:p-8 flex flex-wrap">
        <Cover :src="props.music.cover"/>
        <div>
            <h2>{{ music.title }}</h2>
        </div>
    
        <MusicMenuButtons :music="props.music" />
    </div>
</template>