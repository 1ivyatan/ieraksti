<script setup>
import ListItem from "./Partials/ListItem.vue";

const props = defineProps({
    trackList: {
        type: Object,
        required: true
    }
});
</script>
<template>
    <ListItem v-for="track in trackList" :track="track"/>
</template>