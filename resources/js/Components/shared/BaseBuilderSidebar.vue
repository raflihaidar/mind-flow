<script setup>
import useDragAndDrop from '@/Composables/UseDnD';
import BaseNode from '@/Components/ui/node/BaseNode.vue';

const { onDragStart } = useDragAndDrop()
</script>

<template>
    <aside class="fixed top-1/2 -translate-y-1/2 left-5 h-[80%] w-64 bg-white shadow-[0_4px_6px_rgba(0,0,0,0.1),0_1px_3px_rgba(0,0,0,0.08)] z-20 rounded-2xl py-3">
      <nav class="p-4">
        <h3 class="font-semibold text-gray-800">Daftar Component</h3>
        <div class="nodes mt-5 grid gap-y-5">
          <div
            class="w-38 bg-white shadow-sm rounded-sm py-5 px-3 block border"
            :draggable="true"
            @dragstart="onDragStart($event, 'custom')"
          >
          </div>
        </div>
      </nav>
    </aside>
</template>

