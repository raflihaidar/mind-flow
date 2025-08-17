<script setup>
import { Background } from '@vue-flow/background'
</script>

<template>
    <div class="relative h-full w-full">
        <Background :size="1" :gap="20" pattern-color="#BDBDBD" />
        <div class="pointer-none">
            <slot />
        </div>
    </div>
</template>
