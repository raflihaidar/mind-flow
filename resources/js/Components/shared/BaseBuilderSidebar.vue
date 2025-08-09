<script setup>
import useDragAndDrop from '@/Composables/UseDnD';
import BaseNode from '@/Components/ui/node/BaseNode.vue';

const { onDragStart } = useDragAndDrop()
</script>

<template>
    <aside class="z-20 border-yellow-400 bg-gray-800 text-white">
        <nav class="p-4 text-white">
            <h3>Daftar Component</h3>

            <div class="nodes mt-5 grid gap-y-5">
                <div>
                    <div class="vue-flow__node-input" :draggable="true" @dragstart="onDragStart($event, 'input')">
                        Input Node
                    </div>
                </div>

                <div class="vue-flow__node-default" :draggable="true" @dragstart="onDragStart($event, 'default')">
                    Default Node
                </div>

                <div class="vue-flow__node-output" :draggable="true" @dragstart="onDragStart($event, 'output')">
                    Output Node
                </div>

                <BaseNode :draggable="true" @dragstart="onDragStart($event, 'custom')"/>
            </div>
        </nav>
    </aside>
</template>
