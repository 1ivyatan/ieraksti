<script setup>
import MusicMenuButtons from '@/Components/Music/MusicMenuButtons/MusicMenuButtons.vue';
import Cover from '../Cover/Cover.vue';
import { Link } from '@inertiajs/vue3';

const props = defineProps({
    music: {
        type: Object,
        required: true
    }
});

</script>

<template>
    <div 
        class="
            bg-white p-4 shadow sm:rounded-lg sm:p-8
            w-32 
            "
    >
        <Link 
            :href="route('content.music.show', {
                id: props.music.id
            })"
        >
            <Cover :src="props.music.cover"/>
            <h2 class="text-ellipsis  overflow-hidden">
                {{ music.title }}
            </h2>
        </Link>

        <MusicMenuButtons :music="props.music" />
    </div>
</template>