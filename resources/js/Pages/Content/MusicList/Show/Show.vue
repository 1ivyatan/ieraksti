<script setup>
import WithSidebarSearchLayout from '@/Layouts/WithSidebarSearchLayout.vue';
import MusicPicker from "@/Components/MusicList/MusicPicker/MusicPicker.vue";

//import HorizMusicCard from '@/Components/Music/HorizMusicCard.vue';
//import DeleteMusicForm from '@/Pages/Content/Music/Destroy/DeleteMusicForm.vue';
//import ShowPlayButton from '@/Components/MusicPlayer/Components/ShowPlayButton.vue';
import { Head, Link } from '@inertiajs/vue3';

const props = defineProps({
    musicListInfo: {
        type: Object,
        required: true,
    },
    musicListTracks: {
        type: Object,
        required: true,
    },
});

</script>

<template>
    <Head :title="props.musicListInfo.title" />

    <WithSidebarSearchLayout>
        <section
            class="bg-white p-4 shadow sm:rounded-lg sm:p-8 flex flex-wrap"
        >
            <h1>
                {{ props.musicListInfo.title }}
            </h1>
        </section>

        <br>

        <section
            class="bg-white p-4 shadow sm:rounded-lg sm:p-8 flex flex-wrap"
        >
            <MusicPicker :trackListItems="props.musicListTracks"/>
        </section>


            <!--<div v-if="$page.props.auth.user && $page.props.auth.user.id == musicList.creator_id">
                <Link
                    :href="route('content.musiclist.edit', {
                        id: props.musicList.id
                    })"
                >Edit</Link>
            </div>-->
    </WithSidebarSearchLayout>
</template>