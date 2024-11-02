<script setup>
import WithSidebarSearchLayout from '@/Layouts/WithSidebarSearchLayout.vue';
import PrimaryButton from '@/Components/Button/PrimaryButton.vue';
import DeleteForm from './Partials/DeleteForm.vue';
import { Head } from '@inertiajs/vue3';

const props = defineProps({
    music: {
        type: Object,
    },
});

const editMusic = () => {
    alert("hi!");
}
</script>

<template>
    <Head :title="props.music.title" />

    <WithSidebarSearchLayout>
        <section>
            <div class="flex">
                <div>
                    <img :src="music.cover" class="w-64" />
                </div>
                <div>
                    <h2>{{ music.title }}</h2>
                </div>
            </div>
            <div v-if="$page.props.auth.user && $page.props.auth.user.id == music.uploader_id">
                <PrimaryButton @click="editMusic">Upload</PrimaryButton>
                <DeleteForm>Delete</DeleteForm>
            </div>
            <p>
                {{ music }}
            </p>
        </section>
        
    </WithSidebarSearchLayout>
</template>