<script setup>
import AmbiauthenicatedLayout from '@/Layouts/AmbiauthenicatedLayout.vue';
import InputError from '@/Components/Input/InputError.vue';
import InputLabel from '@/Components/Input/InputLabel.vue';
import PrimaryButton from '@/Components/Button/PrimaryButton.vue';
import TextInput from '@/Components/Input/TextInput.vue';
import { Head, useForm } from '@inertiajs/vue3';
import { ref } from 'vue';
import DangerButton from '@/Components/Button/DangerButton.vue';

const form = useForm({
    title: "",
    cover: null,
});

const recordContent = () => {
    form.post(route("content.music.upload"));
}

const hasCover = ref(false);
</script>

<template>
    <Head title="Upload" />

    <AmbiauthenicatedLayout>
        <template #header>
            <h2
                class="text-xl font-semibold leading-tight text-gray-800"
            >
                Upload
            </h2>
        </template>

        <section>
            <form
                class="mt-6 space-y-6"
                @submit.prevent="recordContent"
                enctype="multipart/form-data"
            >
                <!-- title -->
                <div>
                    <InputLabel for="title" value="Title" />

                    <TextInput 
                        id="title"
                        type="text"
                        class="mt-1 block w-full"
                        v-model="form.title"
                        required
                        autofocus
                    />

                    <InputError class="mt-2" :message="form.errors.title" />
                </div>

                <!-- album cover -->
                <div>
                    <InputLabel for="cover" value="Cover" />

                    <input
                        id="cover"
                        ref="cover"
                        type="file"
                        class="mt-1 block w-full"
                        @input="
                            hasCover = true;
                            form.cover = $event.target.files[0]
                        " 
                    />

                    <InputError class="mt-2" :message="form.errors.cover" />

                    <DangerButton 
                        @click="
                            form.cover = $refs.cover.value = null;
                            hasCover = false
                        "
                        type="button"
                        id="albumremove"
                        v-show="hasCover"
                    >
                        Remove
                    </DangerButton>

                </div>

                <PrimaryButton>Upload</PrimaryButton>

                <progress v-if="form.progress" :value="form.progress.percentage" max="100">
                    {{ form.progress.percentage }}
                </progress>

            </form>
        </section>
    </AmbiauthenicatedLayout>
</template>