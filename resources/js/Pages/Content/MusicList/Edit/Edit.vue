<script setup>
import AmbiauthenicatedLayout from '@/Layouts/AmbiauthenicatedLayout.vue';
import UpdateInformation from './Partials/UpdateInformation.vue';
//import DeleteMusicForm from '../Destroy/DeleteMusicForm.vue';
import { Head, useForm } from '@inertiajs/vue3';

const props = defineProps({
    musicList: {
        type: Object,
        required: true
    }
});
</script>

<template>
    <Head :title="`Edit '${props.musicList.title}''`" />

    <AmbiauthenicatedLayout>
        <UpdateInformation :musicList="props.musicList" />
       <!-- <section 
            class="bg-white p-4 shadow sm:rounded-lg sm:p-8 mb-8"
        >
            <DeleteMusicForm :id="props.music.id"/>
        </section>-->
        
        {{ props.musicList }}
    </AmbiauthenicatedLayout>
</template>