<script setup>

const props = defineProps({
    targetMusic: {
        type: String,
        required: true
    }
});

</script>

<template>
    hi!

    {{ props.targetMusic }}
</template>