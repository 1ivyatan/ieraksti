<script setup>
const props = defineProps({
    list: {
        type: Object,
        required: true
    }
});
</script>

<template>
    <div class="bg-white p-4 shadow sm:rounded-lg sm:p-8 flex flex-wrap">
        <div>
            <h2>{{ list.title }}</h2>
        </div>
    </div>
</template>