<script setup>
import WithSidebarSearchLayout from '@/Layouts/WithSidebarSearchLayout.vue';
//import HorizMusicCard from '@/Components/Music/HorizMusicCard.vue';
//import DeleteMusicForm from '@/Pages/Content/Music/Destroy/DeleteMusicForm.vue';
//import ShowPlayButton from '@/Components/MusicPlayer/Components/ShowPlayButton.vue';
import { Head, Link } from '@inertiajs/vue3';

const props = defineProps({
    musicList: {
        type: Object,
        required: true,
    },
});

</script>

<template>
    <Head :title="props.musicList.title" />

    <WithSidebarSearchLayout>
        <section>
            <!--<div v-if="$page.props.auth.user && $page.props.auth.user.id == musicList.creator_id">
                <Link
                    :href="route('content.musiclist.edit', {
                        id: props.musicList.id
                    })"
                >Edit</Link>
            </div>-->

        </section>
        
        {{ musicList }}

    </WithSidebarSearchLayout>
</template>