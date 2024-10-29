<script setup>
import { Head, Link } from '@inertiajs/vue3';
import AmbiauthenicatedLayout from '@/Layouts/AmbiauthenicatedLayout.vue';
import SidebarSearch from '@/Layouts/SidebarSearch.vue';
</script>

<template>
    <AmbiauthenicatedLayout>
        <div class="flex flex-wrap-reverse">
            <div class="max-w-64">
                <SidebarSearch />
            </div>
            <div class="basis-3/5">
                <slot />
            </div>
        </div>
    </AmbiauthenicatedLayout>
</template>