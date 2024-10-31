<script setup>
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, useForm } from '@inertiajs/vue3';

const form = useForm({
    title: "",
    cover: null
});

const uploadContent = () => {
    form.post("/upload", {
    //  alert("g");
    });
};

</script>

<template>
    <Head title="Upload" />

    <form
        class="mt-6 space-y-6"
        @submit.prevent="uploadContent"
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
                required
                @input="form.cover = $event.target.files[0]" 
            />

            <progress v-if="form.progress" :value="form.progress.percentage" max="100">
                {{ form.progress.percentage }}
            </progress>

            <PrimaryButton>Upload</PrimaryButton>
    </form>
</template>