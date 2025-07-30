<script setup>
import BaseBuilderSidebar from '@/Components/shared/BaseBuilderSidebar.vue';
import BaseFooter from '@/Components/shared/BaseFooter.vue';
import BaseHeader from '@/Components/shared/BaseHeader.vue';
</script>

<template>
    <BaseHeader/>
    <BaseBuilderSidebar/>
    <slot/>
    <BaseFooter/>
</template>
