<script setup>
import AmbiauthenicatedLayout from '@/Layouts/AmbiauthenicatedLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';

defineProps({
    music: {
        type: Object,
    }
});

</script>

<template>
    <Head :title="'Edit \'' + music.title + '\''" />

    <AmbiauthenicatedLayout>
        <template #header>
            <h2
                class="text-xl font-semibold leading-tight text-gray-800"
            >
                Edit "{{ music.title }}"
            </h2>
        </template>

    </AmbiauthenicatedLayout>
</template>