<script setup>
import DangerButton from '@/Components/Button/DangerButton.vue';
import Modal from '@/Components/Other/Modal.vue';
import { router } from '@inertiajs/vue3';
import { ref } from 'vue';

const props = defineProps({
    id: {
        type: String,
        required: true
    }
});

const confirmTrackDeletionDialog = ref(false);

const confirmTrackDeletion = () => {
    confirmTrackDeletionDialog.value = true;
};

const closeModal = () => {
    confirmTrackDeletionDialog.value = false;
};

const deleteTrack = () => {
    router.delete(route('content.music.destroy', {
        id: props.id,
        onSuccess: () => closeModal()
    }));
}
</script>

<template>
    <button
        type="button"
        class="block w-full px-4 py-2 text-start text-sm leading-5  bg-red-700
        text-white transition duration-150 ease-in-out hover:bg-red-500 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 active:bg-red-700"
        @click="confirmTrackDeletion"
    >
        Delete
    </button>

    <Modal :show="confirmTrackDeletionDialog" @close="closeModal">
        <h2
            class="text-lg font-medium text-gray-900"
        >
            Are you sure you want to delete track?
        </h2>

        <DangerButton
            class="ms-3"
            @click="deleteTrack"
        >
            Delete Track
        </DangerButton>
    </Modal>
</template>
