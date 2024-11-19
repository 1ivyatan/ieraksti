<script setup>
import WithSidebarSearchLayout from '@/Layouts/WithSidebarSearchLayout.vue';
import HorizMusicCard from '@/Components/Music/MusicCard/HorizMusicCard.vue';
import DeleteMusicForm from '@/Pages/Content/Music/Destroy/DeleteMusicForm.vue';
import ShowPlayButton from '@/Components/MusicPlayer/Components/ShowPlayButton.vue';

import MusicMenuButtons from '@/Components/Music/MusicMenuButtons/MusicMenuButtons.vue';

import { Head, Link } from '@inertiajs/vue3';

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
            <HorizMusicCard :music="props.music"/>

            <MusicMenuButtons :music="props.music" />

            <div v-if="$page.props.auth.user && $page.props.auth.user.id == music.uploader_id">
                <Link
                    :href="route('content.music.edit', {
                        id: props.music.id
                    })"
                >Edit</Link>
                <DeleteMusicForm :id="props.music.id"/>
            </div>

            <ShowPlayButton :music="props.music"/>
        </section>
        
    </WithSidebarSearchLayout>
</template>