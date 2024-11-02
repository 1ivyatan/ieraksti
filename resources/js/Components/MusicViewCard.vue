<script setup>

defineProps({
    track: {
        type: Object
    }
    
});
</script>

<template>
    <div class="flex">
        <div>
            <img :src="track.cover" class="w-64" />
        </div>
        <div>
            <h2>{{ track.title }}</h2>
        </div>
    </div>
</template>