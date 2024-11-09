<script setup>
import AmbiauthenicatedLayout from '@/Layouts/AmbiauthenicatedLayout.vue';
import UpdateInformation from './Partials/UpdateInformation.vue';
import UpdateCover from './Partials/UpdateCover.vue';
import { Head, useForm } from '@inertiajs/vue3';

const props = defineProps({
    music: {
        type: Object,
        required: true
    }
});
</script>

<template>
    <Head :title="`Edit '${props.music.title}''`" />

    <AmbiauthenicatedLayout>
        <UpdateInformation :music="props.music" />
        <UpdateCover :music="props.music" />
        {{ props.music }}
    </AmbiauthenicatedLayout>
</template>