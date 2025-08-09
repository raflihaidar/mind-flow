<script setup>
import { Background } from '@vue-flow/background'
</script>

<template>
    <div class="relative h-full w-full">
        <Background :size="2" :gap="20" pattern-color="#BDBDBD" />
        <div class="opacity-40 absolute top-0 left-0 h-full w-full flex items-center justify-center z-[1px] pointer-none">
            <slot />
        </div>
    </div>
</template>
