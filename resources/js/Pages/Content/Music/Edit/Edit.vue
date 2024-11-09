<script setup>
import AmbiauthenicatedLayout from '@/Layouts/AmbiauthenicatedLayout.vue';
import UpdateInformation from './Partials/UpdateInformation.vue';
import UpdateCover from './Partials/UpdateCover.vue';
import UpdateMusic from './Partials/UpdateMusic.vue';
import DeleteMusicForm from '../Destroy/DeleteMusicForm.vue';
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
        <UpdateMusic :music="props.music" />
        <section 
            class="bg-white p-4 shadow sm:rounded-lg sm:p-8 mb-8"
        >
            <DeleteMusicForm :id="props.music.id"/>
        </section>
        
        {{ props.music }}
    </AmbiauthenicatedLayout>
</template>