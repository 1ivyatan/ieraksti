<script setup>
import WithSidebarSearchLayout from '@/Layouts/WithSidebarSearchLayout.vue';
import MusicCard from '@/Components/MusicViewCard.vue';

defineProps({
    music: {
        type: Object,
    },
});
</script>

<template>
    <Head title="Upload" />

    <WithSidebarSearchLayout>
        <section>
            <MusicCard :track="music"/>
            <p>
                {{ music }}
            </p>
        </section>
        
    </WithSidebarSearchLayout>
</template>