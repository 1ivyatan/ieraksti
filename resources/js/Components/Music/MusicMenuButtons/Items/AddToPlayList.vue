<script setup>
import Modal from '@/Components/Other/Modal.vue';
import Picker from "@/Components/MusicList/Picker/Picker.vue";

import axios from "axios";
import { router, useForm } from '@inertiajs/vue3';
import { ref } from 'vue';

const props = defineProps({
    id: {
        type: String,
        required: true
    }
});

/* modal */
const addToPlaylistModalOpen = ref(false);

const openPlaylistModal = () => {
    addToPlaylistModalOpen.value = true;
};

const closeModal = () => {
    addToPlaylistModalOpen.value = false;
};

const addToPlaylist = (id) => {
    axios.post(route('content.musiclist.tracks.add', {
        playlistid: props.id,
        trackid: id
    }))
    .then((response) => {
        console.log(response)
    });
}

</script>

<template>
    <button
        type="button"
        class="block w-full px-4 py-2 text-start text-sm leading-5 text-gray-700 transition duration-150 ease-in-out hover:bg-gray-100 focus:bg-gray-100 focus:outline-none"
        @click="openPlaylistModal"
    >
        Add to music list
    </button>

    <Modal 
        :show="addToPlaylistModalOpen"
        @close="closeModal"
    >
        <Picker :targetMusic="props.id" :action="addToPlaylist"/>
    </Modal>

</template>
