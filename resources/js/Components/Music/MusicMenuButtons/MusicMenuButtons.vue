<script setup>
import Dropdown from '@/Components/Dropdown/Dropdown.vue';
import DropdownLink from '@/Components/Dropdown/DropdownLink.vue';

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
                    Menu                      
                </button>
            </span>
        </template>

        <template #content>
            <DropdownLink
                :href="route('profile.edit')"
            >
                Profile
            </DropdownLink>
        </template>

    </Dropdown>

    {{ $page.props.auth.user }}
</template>