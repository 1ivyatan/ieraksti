<script setup>
import WithSidebarSearchLayout from '@/Layouts/WithSidebarSearchLayout.vue';
import PrimaryButton from '@/Components/Button/PrimaryButton.vue';
import DeleteMusicForm from '@/Pages/Content/Music/Destroy/DeleteMusicForm.vue';
import { Head } from '@inertiajs/vue3';

const props = defineProps({
    music: {
        type: Object,
        required: true,
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
                <DeleteMusicForm />
            </div>
            <p>
                {{ music }}
            </p>
        </section>
        
    </WithSidebarSearchLayout>
</template>