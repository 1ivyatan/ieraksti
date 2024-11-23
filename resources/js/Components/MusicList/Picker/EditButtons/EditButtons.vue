<script setup>
import DangerButton from "@/Components/Button/DangerButton.vue";

const props = defineProps({
    id: {
        type: String,
        required: true
    }
});
</script>

<template>
    <DangerButton>Delete</DangerButton>
</template>