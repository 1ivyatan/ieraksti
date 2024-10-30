<script setup>
import AmbiauthenicatedLayout from '@/Layouts/AmbiauthenicatedLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head } from '@inertiajs/vue3';

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
                    <InputLabel for="coverfile" value="Audio file" />

                    <input
                        id="coverfile"
                        type="file"
                        class="mt-1 block w-full"
                        required
                    />

                </div>

                <div class="flex items-center gap-4">
                    <PrimaryButton>Upload</PrimaryButton>
                </div>
            </form>
        </section>
        
    </AmbiauthenicatedLayout>
</template>