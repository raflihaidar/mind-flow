<script setup>
import { cn } from '@/Lib/utils';
import { Input } from '@/Components/ui/input';

const props = defineProps({
  class: { type: null, required: false },
});
</script>

<template>
  <Input
    data-slot="sidebar-input"
    data-sidebar="input"
    :class="cn('bg-background h-8 w-full shadow-none', props.class)"
  >
    <slot />
  </Input>
</template>
