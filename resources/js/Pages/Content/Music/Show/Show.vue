<script setup>
import WithSidebarSearchLayout from '@/Layouts/WithSidebarSearchLayout.vue';
import VertMusicCard from '@/Components/Music/VertMusicCard.vue';
import PrimaryButton from '@/Components/Button/PrimaryButton.vue';
import DeleteMusicForm from '@/Pages/Content/Music/Destroy/DeleteMusicForm.vue';
import ShowPlayButton from '@/MusicPlayer/Components/ShowPlayButton.vue';
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
            <VertMusicCard :music="props.music"/>

            <div v-if="$page.props.auth.user && $page.props.auth.user.id == music.uploader_id">
                <PrimaryButton @click="editMusic">Upload</PrimaryButton>
                <DeleteMusicForm :id="props.music.id"/>
            </div>

            <ShowPlayButton :music="props.music"/>
            
            <p>
                {{ music }}
            </p>
        </section>
        
    </WithSidebarSearchLayout>
</template>