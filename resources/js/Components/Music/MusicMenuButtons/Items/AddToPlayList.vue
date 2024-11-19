<script setup>
import Modal from '@/Components/Other/Modal.vue';
import { router } from '@inertiajs/vue3';
import { ref } from 'vue';

const props = defineProps({
    id: {
        type: String,
        required: true
    }
});

</script>

<template>
    <button
        type="button"
        class="block w-full px-4 py-2 text-start text-sm leading-5 text-gray-700 transition duration-150 ease-in-out hover:bg-gray-100 focus:bg-gray-100 focus:outline-none"
    >
        Add to music list
    </button>
</template>
