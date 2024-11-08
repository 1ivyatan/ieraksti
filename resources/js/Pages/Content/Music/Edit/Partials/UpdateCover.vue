<script setup>
import InputError from '@/Components/Input/InputError.vue';
import InputLabel from '@/Components/Input/InputLabel.vue';
import PrimaryButton from '@/Components/Button/PrimaryButton.vue';
import TextInput from '@/Components/Input/TextInput.vue';
import Cover from '@/Components/Music/Cover.vue';
import Modal from '@/Components/Other/Modal.vue';
import { useForm , usePage  } from '@inertiajs/vue3';
import { ref } from 'vue';
import DangerButton from '@/Components/Button/DangerButton.vue';

const props = defineProps({
    music: {
        type: String,
        required: true
    }
});

const form = useForm({
    cover: null,
});

const updateCover = () => {
    form.put(route("content.music.cover.update", {
        id: props.music.id
    }));
}

/* deletion */
const confirmCoverDeletionDialog = ref(false);

const confirmCoverDeletion = () => {
    confirmCoverDeletionDialog.value = true;
};

const closeModal = () => {
    confirmCoverDeletionDialog.value = false;
};

const deleteCover = () => {
    form.delete(route("content.music.cover.destroy", {
        id: props.music.id,
        onSuccess: () => closeModal()
    }));
}

</script>

<template>
    <section 
        class="bg-white p-4 shadow sm:rounded-lg sm:p-8 mb-8"
    >
        <form
            @submit.prevent="updateCover"
            enctype="multipart/form-data"
        >
            <div>
                <div>
                    <InputLabel for="cover" value="Cover" />
                </div>
                <div>
                    <Cover :src="props.music.cover"/>
                </div>
                <div>
                    <TextInput 
                        id="title"
                        type="file"
                        class="mt-1 block w-full"
                        v-model="form.title"
                        required
                        autofocus
                    />

                    <InputError class="mt-2" :message="form.errors.cover" />
                </div>
            </div>

            <div>
                <PrimaryButton>Update</PrimaryButton>
                <DangerButton
                    type="button"
                    @click="confirmCoverDeletion"
                    v-if="props.music.cover != null"
                >Delete</DangerButton>
            </div>

            <progress v-if="form.progress" :value="form.progress.percentage" max="100">
                {{ form.progress.percentage }}
            </progress>
        </form>
    </section>

    <Modal :show="confirmCoverDeletionDialog" @close="closeModal">
        <h2
            class="text-lg font-medium text-gray-900"
        >
            Are you sure you want to delete cover?
        </h2>

        <DangerButton
            class="ms-3"
            @click="deleteCover"
        >
            Delete Track
        </DangerButton>
    </Modal>
</template>