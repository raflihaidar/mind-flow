<script setup>
import { cn } from '@/Lib/utils';
import { alertVariants } from ".";

const props = defineProps({
  class: { type: null, required: false },
  variant: { type: null, required: false },
});
</script>

<template>
  <div
    data-slot="alert"
    :class="cn(alertVariants({ variant }), props.class)"
    role="alert"
  >
    <slot />
  </div>
</template>
