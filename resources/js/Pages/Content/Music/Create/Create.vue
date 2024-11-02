<script setup>
import AmbiauthenicatedLayout from '@/Layouts/AmbiauthenicatedLayout.vue';
import UploadForm from './Partials/CreateForm.vue';

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
            <UploadForm />
        </section>
        
    </AmbiauthenicatedLayout>
</template>