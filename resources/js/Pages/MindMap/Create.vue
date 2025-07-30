<script setup>
import CanvasBuilderLayout from '@/Layouts/CanvasBuilderLayout.vue';
import { Head } from '@inertiajs/vue3';

defineOptions({
    layout : CanvasBuilderLayout
})

defineProps({
    title : String
})
</script>


<template>
    <Head :title="title"/>
</template>
