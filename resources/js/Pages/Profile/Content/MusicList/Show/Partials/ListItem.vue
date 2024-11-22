<script setup>

const props = defineProps({
    track: {
        type: Object,
        required: true
    }
});
</script>

<template>
    {{ props.track.title }}
</template>