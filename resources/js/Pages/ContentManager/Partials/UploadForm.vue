<script setup>
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, useForm } from '@inertiajs/vue3';

const uploadContent = () => {
    form.post(route("content.upload"), {
        
    });
    alert("d");
};

</script>

<template>
    <form
        class="mt-6 space-y-6"
        enctype="multipart/form-data"
        @submit.prevent="uploadContent"
        method="post"
    >
        <div>
            <InputLabel for="title" value="Title" />

            <TextInput
                id="title"
                type="text"
                class="mt-1 block w-full"
                required
                autofocus
            />

        </div>

        <div>
            <InputLabel for="cover" value="Cover" />

            <input
                id="cover"
                type="file"
                class="mt-1 block w-full"
                required
            />
        </div>

        <div class="flex items-center gap-4">
            <PrimaryButton
                @click="uploadContent"
            >Upload</PrimaryButton>
        </div>
    </form>
</template>