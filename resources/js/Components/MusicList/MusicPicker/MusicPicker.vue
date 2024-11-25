<script setup>
import ShowPlayButton from '@/Components/MusicPlayer/Components/PlayOneTrackButton.vue';
import Cover from "@/Components/Music/Cover/Cover.vue";

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

                class="inline"
            >
                <Cover 
                    :src="item.cover"
                    class="h-8 w-auto"    
                />

                {{ item.title }}
            </Link>

            <ShowPlayButton :music="item"/>
        </div>
    </div>
</template>