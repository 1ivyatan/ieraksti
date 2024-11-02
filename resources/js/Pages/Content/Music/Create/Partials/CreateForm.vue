<script setup>
import InputError from '@/Components/Input/InputError.vue';
import InputLabel from '@/Components/Input/InputLabel.vue';
import PrimaryButton from '@/Components/Button/PrimaryButton.vue';
import TextInput from '@/Components/Input/TextInput.vue';
import { Head, useForm } from '@inertiajs/vue3';

const form = useForm({
    title: "",
    cover: null
});

const uploadContent = () => {
    form.post("/upload", {
    });
};

</script>

<template>
    <form
        class="mt-6 space-y-6"
        @submit.prevent="uploadContent"
        enctype="multipart/form-data"
    >
            <TextInput
                id="title"
                type="text"
                class="mt-1 block w-full"
                v-model="form.title"
                required
                autofocus
            />

            <input
                id="cover"
                type="file"
                class="mt-1 block w-full"
                @input="form.cover = $event.target.files[0]" 
            />

            <progress v-if="form.progress" :value="form.progress.percentage" max="100">
                {{ form.progress.percentage }}
            </progress>

            <PrimaryButton>Upload</PrimaryButton>
    </form>
</template>