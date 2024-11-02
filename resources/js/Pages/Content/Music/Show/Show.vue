<script setup>
import WithSidebarSearchLayout from '@/Layouts/WithSidebarSearchLayout.vue';
import PrimaryButton from '@/Components/Button/PrimaryButton.vue';
import DeleteForm from './Partials/DeleteForm.vue';

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
            <div class="flex">
                <div>
                    <img :src="music.cover" class="w-64" />
                </div>
                <div>
                    <h2>{{ music.title }}</h2>
                </div>
            </div>
            <div>
                <PrimaryButton>Upload</PrimaryButton>
                <DeleteForm>Delete</DeleteForm>
            </div>
            <p>
                {{ music }}
            </p>
        </section>
        
    </WithSidebarSearchLayout>
</template>