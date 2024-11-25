<script setup>
import WithSidebarSearchLayout from '@/Layouts/WithSidebarSearchLayout.vue';
import HorizMusicCard from '@/Components/Music/MusicCard/HorizMusicCard.vue';
import DeleteMusicForm from '@/Pages/Content/Music/Destroy/DeleteMusicForm.vue';
import ShowPlayButton from '@/Components/MusicPlayer/Components/PlayOneTrackButton.vue';

import { Head, Link } from '@inertiajs/vue3';

const props = defineProps({
    music: {
        type: Object,
        required: true,
    },
});

</script>

<template>
    <Head :title="props.music.title" />

    <WithSidebarSearchLayout>
        <section>
            <HorizMusicCard :music="props.music"/>

            <ShowPlayButton :music="props.music"/>
        </section>
        
    </WithSidebarSearchLayout>
</template>