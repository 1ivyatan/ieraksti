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

    <!--
    <Head :title="'Edit \'' + music.title + '\''" />

    <AmbiauthenicatedLayout>
        <template #header>
            <h2
                class="text-xl font-semibold leading-tight text-gray-800"
            >
                Edit "{{ music.title }}"
            </h2>
        </template>

        <section>
            <BasicInformation 
                :title="props.music.title"
                :id="props.music.id"
            />
        </section>

    </AmbiauthenicatedLayout>-->
</template>