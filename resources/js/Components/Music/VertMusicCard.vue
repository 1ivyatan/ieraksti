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
    <div 
        class="bg-white p-4 shadow sm:rounded-lg sm:p-8"
    >
        <a 
            :href="route('content.music.show', {
                id: props.music.id
            })"
        >
            <Cover :src="props.music.cover"/>
            <h2>
                {{ music.title }}
            </h2>
        </a>
    </div>
</template>