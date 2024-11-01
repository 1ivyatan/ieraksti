<script setup>
import AmbiauthenicatedLayout from '@/Layouts/AmbiauthenicatedLayout.vue';

defineProps({
    music: {
        type: Object,
    },
});
</script>

<template>
    <Head title="Upload" />

    <AmbiauthenicatedLayout>
        <section>
            hello
            <img :src="music.cover"/>
            <pre>
                {{ music }}
            </pre>
        </section>
        
    </AmbiauthenicatedLayout>
</template>