<script setup>
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
    <div v-for="item in list.items">
        {{ item }}
        <!--<Link getMusicInfo(
            :href="route('content.music.show', {
                id: item.music_id
            })"
        >
            <h2>
                {{ item.title }}
            </h2>
        </Link>-->
    </div>


    {{ props.trackListItems }}
</template>