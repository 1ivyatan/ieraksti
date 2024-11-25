<script setup>
import ShowPlayButton from '@/Components/MusicPlayer/Components/ShowPlayButton.vue';

import { Link } from '@inertiajs/vue3';
import { onMounted, reactive } from 'vue';
import axios from "axios";

const props = defineProps({
    trackListItems: {
        type: Object,
        required: true
    }
});

const list = reactive({
    items: new Array()
});

onMounted(() => {
    props.trackListItems.forEach(
        (item) => {
            axios.get(
                route("content.music.retrieve", {
                    id: item.music_id
                })
            ).then(
                (response) => {
                    list.items.push(response.data);
                }
            );
        }
    );
});

</script>

<template>
    <div
        class="flex flex-col"
    >
        <div 
            v-for="item in list.items"
            class="flex w-full gap-8"
        >
            <Link
                :href="route('content.music.show', {
                    id: item.id
                })"
            >
                {{ item.title }}
            </Link>

            <ShowPlayButton :music="item"/>
        </div>
    </div>
</template>