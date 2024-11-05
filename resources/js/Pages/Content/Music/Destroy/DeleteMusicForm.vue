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
    alert(props.id);
    router.delete(route('content.music.destroy', {
        id: props.id
    }));
}
</script>

<template>
    <DangerButton @click="confirmTrackDeletion">Delete</DangerButton>

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