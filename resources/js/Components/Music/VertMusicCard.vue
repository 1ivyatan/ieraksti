<script setup>
import Cover from './Cover.vue';
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
        class="bg-white p-4 shadow sm:rounded-lg sm:p-8"
    >
        <Link 
            :href="route('content.music.show', {
                id: props.music.id
            })"
        >
            <Cover :src="props.music.cover"/>
            <h2>
                {{ music.title }}
            </h2>
        </Link>
    </div>
</template>