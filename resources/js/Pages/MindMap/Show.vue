<script setup>
import { ref } from 'vue'
import { VueFlow } from '@vue-flow/core'
import { Head, router } from '@inertiajs/vue3';

const props = defineProps({
    data : Object
})

import SpecialEdge from '@/Components/ui/edge/SpecialEdge.vue'
import SpecialNode from '@/Components/ui/node/SpecialNode.vue'
import Button from '@/Components/ui/button/Button.vue'

const nodes = ref(props.data.nodes)

const edges = ref(props.data.edges)
</script>

<template>
    <div class="w-screen h-screen p-5 overflow-hidden">
        <div class="flex gap-x-5">
            <Button @click="router.get('/')" class="cursor-pointer">Back</Button>
            <Button @click="router.get('/')" class="cursor-pointer">Save</Button>
        </div>

        <VueFlow :nodes="nodes" :edges="edges" fit-view-on-init>
            <!-- bind your custom node type to a component by using slots, slot names are always `node-<type>` -->
            <template #node-special="specialNodeProps">
                <SpecialNode v-bind="specialNodeProps" />
            </template>

            <!-- bind your custom edge type to a component by using slots, slot names are always `edge-<type>` -->
            <template #edge-special="specialEdgeProps">
                <SpecialEdge v-bind="specialEdgeProps" />
            </template>
        </VueFlow>
    </div>
</template>
