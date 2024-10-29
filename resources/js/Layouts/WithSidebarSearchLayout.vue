<script setup>
import { Head, Link } from '@inertiajs/vue3';
import AmbiauthenicatedLayout from '@/Layouts/AmbiauthenicatedLayout.vue';
import SidebarSearch from '@/Layouts/SidebarSearch.vue';
</script>

<template>
    <AmbiauthenicatedLayout>
        <div class="flex flex-wrap-reverse">
            <div>
                <SidebarSearch />
            </div>
            <div>
                <slot />
            </div>
        </div>
    </AmbiauthenicatedLayout>
</template>