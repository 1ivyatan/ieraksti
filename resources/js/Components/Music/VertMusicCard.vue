<script setup>

defineProps({
    music: {
        type: Object,
        //required: true
    }
});
</script>

<template>
    <div class="bg-white p-4 shadow sm:rounded-lg sm:p-8 flex flex-wrap">
        <div>
            <img :src="music.cover" class="w-64" />
        </div>
        <div>
            <h2>{{ music.title }}</h2>
        </div>
    </div>
</template>