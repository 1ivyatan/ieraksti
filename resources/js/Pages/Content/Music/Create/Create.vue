<script setup>
import AmbiauthenicatedLayout from '@/Layouts/AmbiauthenicatedLayout.vue';
import InputError from '@/Components/Input/InputError.vue';
import InputLabel from '@/Components/Input/InputLabel.vue';
import MusicCover from '@/Components/Music/MusicCover.vue';
import PrimaryButton from '@/Components/Button/PrimaryButton.vue';
import TextInput from '@/Components/Input/TextInput.vue';
import { Head, useForm } from '@inertiajs/vue3';
import { ref } from 'vue';
import DangerButton from '@/Components/Button/DangerButton.vue';

const hasCover = ref(false);

const form = useForm({
    title: "",
    cover: null,
});

const recordContent = () => {
    form.post(route("content.music.upload"), {});
}

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
                <TextInput
                    id="title"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.title"
                    required
                    autofocus
                />

                <div>
                    <input
                        id="cover"
                        ref="cover"
                        type="file"
                        class="mt-1 block w-full"
                        @input="hasCover = true; form.cover = $event.target.files[0]" 
                    />
                    <DangerButton 
                        @click="form.cover = $refs.cover.value = null; hasCover = false"
                        type="button"
                        id="albumremove"
                        v-show="hasCover"
                    >
                        Remove
                    </DangerButton>
                </div>

                <progress v-if="form.progress" :value="form.progress.percentage" max="100">
                    {{ form.progress.percentage }}
                </progress>

                <PrimaryButton>Upload</PrimaryButton>
            </form>
        </section>
        
    </AmbiauthenicatedLayout>
</template>