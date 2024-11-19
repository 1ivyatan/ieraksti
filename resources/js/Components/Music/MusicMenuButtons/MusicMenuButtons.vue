<script setup>
import Dropdown from '@/Components/Dropdown/Dropdown.vue';
import DropdownLink from '@/Components/Dropdown/DropdownLink.vue';

import Delete from "./Items/Delete.vue";
import AddToPlaylist from "./Items/AddToPlayList.vue";

const props = defineProps({
    music: {
        type: Object,
        required: true,
    },
});
</script>

<template>

    <Dropdown align="" width="48">
        <template #trigger>
            <span class="inline-flex rounded-md">
                <button
                    type="button"
                    class="inline-flex items-center rounded-md border border-transparent bg-white px-3 py-2 text-sm font-medium leading-4 text-gray-500 transition duration-150 ease-in-out hover:text-gray-700 focus:outline-none"
                >
                    &#8942;                      
                </button>
            </span>
        </template>

        <template #content>
            <div v-if="$page.props.auth.user">
                <AddToPlaylist :id="props.music.id" />
            </div>

            <div v-if="$page.props.auth.user && $page.props.auth.user.id == music.uploader_id">
                <DropdownLink
                    :href="route('content.music.edit', {
                        id: props.music.id
                    })"
                >
                    Edit
                </DropdownLink>

                <Delete :id="props.music.id" />
            </div>
        </template>

    </Dropdown>
</template>