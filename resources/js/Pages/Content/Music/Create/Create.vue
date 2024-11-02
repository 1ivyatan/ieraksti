<script setup>
import AmbiauthenicatedLayout from '@/Layouts/AmbiauthenicatedLayout.vue';
import InputError from '@/Components/Input/InputError.vue';
import InputLabel from '@/Components/Input/InputLabel.vue';
import PrimaryButton from '@/Components/Button/PrimaryButton.vue';
import TextInput from '@/Components/Input/TextInput.vue';
import { Head, useForm } from '@inertiajs/vue3';

const props = defineProps({
    music: {
        type: Object
    }
});

const form = useForm({
    title: (props.music) ? props.music.title : "",
    cover: null
});

const recordContent = () => {
    if (music) {
        
    } else {
        form.post("/upload", {});
    }
}

const title = (props.music) ? `Edit '${props.music.title}''` : "Upload";
</script>

<template>
    <Head :title="title" />

    <AmbiauthenicatedLayout>
        <template #header>
            <h2
                class="text-xl font-semibold leading-tight text-gray-800"
            >
                {{ title }}
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

                <input
                    id="cover"
                    type="file"
                    class="mt-1 block w-full"
                    @input="form.cover = $event.target.files[0]" 
                />

                <progress v-if="form.progress" :value="form.progress.percentage" max="100">
                    {{ form.progress.percentage }}
                </progress>

                <PrimaryButton>Record</PrimaryButton>
            </form>
        </section>
        
    </AmbiauthenicatedLayout>
</template>