<script setup>
import { Head, Link } from '@inertiajs/vue3';
import AmbiauthenicatedLayout from '@/Layouts/AmbiauthenicatedLayout.vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';

defineProps({
    canLogin: {
        type: Boolean,
    }
});
</script>

<template>
    <AmbiauthenicatedLayout>
        <SidebarSearch />
        huh
    </AmbiauthenicatedLayout>

</template>