<script setup>

const props = defineProps({
    src: {
        type: String
    }
});
</script>

<template>
    <img :src="props.src" class="w-64" v-if="props.src !== null">
</template>