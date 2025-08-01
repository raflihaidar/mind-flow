<script setup>
import { useEventListener, useMediaQuery, useVModel } from "@vueuse/core";
import { TooltipProvider } from "reka-ui";
import { computed, ref } from "vue";
import { cn } from '@/Lib/utils';
import {
  provideSidebarContext,
  SIDEBAR_COOKIE_MAX_AGE,
  SIDEBAR_COOKIE_NAME,
  SIDEBAR_KEYBOARD_SHORTCUT,
  SIDEBAR_WIDTH,
  SIDEBAR_WIDTH_ICON,
} from "./utils";

const props = defineProps({
  defaultOpen: { type: Boolean, required: false, default: true },
  open: { type: Boolean, required: false, default: undefined },
  class: { type: null, required: false },
});

const emits = defineEmits(["update:open"]);

const isMobile = useMediaQuery("(max-width: 768px)");
const openMobile = ref(false);

const open = useVModel(props, "open", emits, {
  defaultValue: props.defaultOpen ?? false,
  passive: props.open === undefined,
});

function setOpen(value) {
  open.value = value; // emits('update:open', value)

  // This sets the cookie to keep the sidebar state.
  document.cookie = `${SIDEBAR_COOKIE_NAME}=${open.value}; path=/; max-age=${SIDEBAR_COOKIE_MAX_AGE}`;
}

function setOpenMobile(value) {
  openMobile.value = value;
}

// Helper to toggle the sidebar.
function toggleSidebar() {
  return isMobile.value
    ? setOpenMobile(!openMobile.value)
    : setOpen(!open.value);
}

useEventListener("keydown", (event) => {
  if (
    event.key === SIDEBAR_KEYBOARD_SHORTCUT &&
    (event.metaKey || event.ctrlKey)
  ) {
    event.preventDefault();
    toggleSidebar();
  }
});

// We add a state so that we can do data-state="expanded" or "collapsed".
// This makes it easier to style the sidebar with Tailwind classes.
const state = computed(() => (open.value ? "expanded" : "collapsed"));

provideSidebarContext({
  state,
  open,
  setOpen,
  isMobile,
  openMobile,
  setOpenMobile,
  toggleSidebar,
});
</script>

<template>
  <TooltipProvider :delay-duration="0">
    <div
      data-slot="sidebar-wrapper"
      :style="{
        '--sidebar-width': SIDEBAR_WIDTH,
        '--sidebar-width-icon': SIDEBAR_WIDTH_ICON,
      }"
      :class="
        cn(
          'group/sidebar-wrapper has-data-[variant=inset]:bg-sidebar flex min-h-svh w-full',
          props.class,
        )
      "
      v-bind="$attrs"
    >
      <slot />
    </div>
  </TooltipProvider>
</template>
