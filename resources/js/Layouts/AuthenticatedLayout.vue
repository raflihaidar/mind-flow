<script setup>
import BaseHeader from '@/Components/shared/BaseHeader.vue';
</script>

<template>
    <div class="w-screen h-screen overflow-hidden">
        <BaseHeader/>
        <main class="w-full h-full px-10 py-5 bg-[#f9f7f1]">
            <slot/>
        </main>
    </div>
</template>
