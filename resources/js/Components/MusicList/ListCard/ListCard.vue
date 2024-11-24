<script setup>
import { Link } from '@inertiajs/vue3';

const props = defineProps({
    list: {
        type: Object,
        required: true
    }
});
</script>

<template>
    <div class="bg-white p-4 shadow sm:rounded-lg sm:p-8 flex flex-wrap">
        <Link 
            :href="route('content.musiclist.show', {
                id: props.list.id
            })"
        >
            <h2>
                {{ props.list.title }}
            </h2>
        </Link>
    </div>
</template>