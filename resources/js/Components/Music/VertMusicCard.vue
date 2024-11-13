<script setup>
import Cover from './Cover.vue';

const props = defineProps({
    music: {
        type: Object,
        required: true
    }
});
</script>

<template>
    <div class="bg-white p-4 shadow sm:rounded-lg sm:p-8 flex flex-col">
        <Cover :src="props.music.cover"/>
        <div>
            <h2>{{ music.title }}</h2>
        </div>
    </div>
</template>