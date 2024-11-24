<script setup>

const props = defineProps({
    trackListItems: {
        type: Object,
        required: true
    }
});

</script>

<template>
    {{ props.trackListItems }}
</template>