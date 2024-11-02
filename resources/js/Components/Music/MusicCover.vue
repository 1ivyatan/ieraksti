<script setup>

defineProps({
    src: {
        type: String,
    }
});
</script>

<template>
    <img :src="src" class="w-64"/>
</template>