<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import Portafolio from '@/Pages/Partials/Portafolio.vue';

defineProps({
    portfolios: {
        type: Array,
        default: () => []
    }
});
</script>

<template>
    <GuestLayout>
        <Head title="Portafolio" />
        <Portafolio :portfolios="portfolios" />
    </GuestLayout>
</template>