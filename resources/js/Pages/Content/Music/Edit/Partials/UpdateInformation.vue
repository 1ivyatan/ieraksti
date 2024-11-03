<script setup>

defineProps({
    title: {
        type: String,
        required: true
    }
});
</script>

<template>
    <div>
        {{ title }}
    </div>
</template>