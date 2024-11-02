<script setup>
import AmbiauthenicatedLayout from '@/Layouts/AmbiauthenicatedLayout.vue';
import UploadForm from './Partials/CreateForm.vue';
import { Head } from '@inertiajs/vue3';

const props = defineProps({
    music: {
        type: Object
    }
});

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
            <UploadForm />
        </section>
        
    </AmbiauthenicatedLayout>
</template>