<script setup>
import { Head, Link } from '@inertiajs/vue3';
import AmbiauthenicatedLayout from '@/Layouts/AmbiauthenicatedLayout.vue';
import SidebarSearch from '@/Layouts/SidebarSearch.vue';
</script>

<template>
    <AmbiauthenicatedLayout>
        <SidebarSearch />
        <slot />
    </AmbiauthenicatedLayout>
</template>