<script setup>
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, useForm } from '@inertiajs/vue3';

const form = useForm({
    title: "",
    cover: ""
});

const uploadContent = () => {
    form.post("/upload", {
    //  alert("g");
    });
};

</script>

<template>
    <form
        class="mt-6 space-y-6"
        enctype="multipart/form-data"
        @submit.prevent="uploadContent"
    >
            <TextInput
                id="title"
                type="text"
                class="mt-1 block w-full"
                required
                autofocus
            />
            <input
                id="cover"
                type="file"
                class="mt-1 block w-full"
                required
            />
            <PrimaryButton>Upload</PrimaryButton>
    </form>
</template>