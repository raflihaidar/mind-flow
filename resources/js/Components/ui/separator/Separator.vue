<script setup>
import { reactiveOmit } from "@vueuse/core";
import { Separator } from "reka-ui";
import { cn } from '@/Lib/utils';

const props = defineProps({
  orientation: { type: String, required: false, default: "horizontal" },
  decorative: { type: Boolean, required: false, default: true },
  asChild: { type: Boolean, required: false },
  as: { type: null, required: false },
  class: { type: null, required: false },
});

const delegatedProps = reactiveOmit(props, "class");
</script>

<template>
  <Separator
    data-slot="separator-root"
    v-bind="delegatedProps"
    :class="
      cn(
        `bg-border shrink-0 data-[orientation=horizontal]:h-px data-[orientation=horizontal]:w-full data-[orientation=vertical]:h-full data-[orientation=vertical]:w-px`,
        props.class,
      )
    "
  />
</template>
