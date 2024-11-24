<script setup>
import { Head } from '@inertiajs/vue3';
import WithSidebarSearchLayout from '@/Layouts/WithSidebarSearchLayout.vue';
import ListCard from '@/Components/MusicList/ListCard/ListCard.vue';

const props = defineProps({
    lists: {
        type: Object,
        required: true
    }
});
</script>

<template>
    <Head title="Tracks" />
    <WithSidebarSearchLayout>
        
        {{ props.lists }}

        <ListCard :list="item" v-for="item in props.lists.data"/>
    </WithSidebarSearchLayout>
</template>