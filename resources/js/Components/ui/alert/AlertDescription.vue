<script setup>
import { cn } from '@/Lib/utils';

const props = defineProps({
  class: { type: null, required: false },
});
</script>

<template>
  <div
    data-slot="alert-description"
    :class="
      cn(
        'text-muted-foreground col-start-2 grid justify-items-start gap-1 text-sm [&_p]:leading-relaxed',
        props.class,
      )
    "
  >
    <slot />
  </div>
</template>
