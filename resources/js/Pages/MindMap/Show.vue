<script setup>
import { onMounted, ref, watch, reactive, markRaw } from 'vue'
import { Head, router, useForm } from '@inertiajs/vue3';
import { VueFlow, useVueFlow } from '@vue-flow/core'
import SpecialEdge from '@/Components/ui/edge/SpecialEdge.vue'
import SpecialNode from '@/Components/ui/node/SpecialNode.vue'
import Button from '@/Components/ui/button/Button.vue'
import CanvasBuilderLayout from '@/Layouts/CanvasBuilderLayout.vue';
import BaseDefaultCanvas from '@/Components/shared/BaseDefaultCanvas.vue';
import useDragAndDrop from '@/Composables/UseDnD';
import BaseNode from '@/Components/ui/node/BaseNode.vue';

const props = defineProps({
    data: Object
})

const {
    onEdgeClick,
    onEdgeDoubleClick,
    onEdgeContextMenu,
    onEdgeMouseEnter,
    onEdgeMouseLeave,
    onEdgeMouseMove,
    onEdgeUpdateStart,
    onEdgeUpdate,
    onEdgeUpdateEnd,
    onConnect,
    addEdges
} = useVueFlow()

const { onDragOver, onDrop, onDragLeave, isDragOver } = useDragAndDrop(props.data.nodes)


const data = reactive({
    nodes: [],
    edges: []
})

onEdgeClick((event, edge) => {
    console.log('edge clicked', edge)
})

const handleDropNode = (event) => {
    const { newNode } = onDrop(event)
    console.log("event : ", event.target)
    console.log("node baru di page : ", newNode)

    data.nodes.push(newNode)
}

const handleNodeClick = ({ node }) => {
    console.log('Clicked node ID:', node.id);
};

onMounted(() => {
    data.nodes = props.data.nodes
    data.edges = props.data.edges
})

const handleSave = () => {
    router.put(`/mindMap/${props.data.id}`, data)
}

watch(() => data.nodes, (newValue) => {
    console.log("nodes baru : ", newValue)
})

onConnect(addEdges)

const nodeTypes = {
    custom: markRaw(BaseNode)
}
</script>


<template>
    <CanvasBuilderLayout class="dnd-flow" @drop="handleDropNode($event)">
        <Button @click="handleSave">save</Button>
        <VueFlow
        :node-types="nodeTypes"
        :nodes="data.nodes"
        :edges="data.edges"
        @nodeClick="handleNodeClick"
        @dragover="onDragOver"
            @dragleave="onDragLeave" fit-view-on-init>
            <BaseDefaultCanvas :class="[{ 'bg-black opacity-50 transition-colors': isDragOver }]">
                <p v-if="isDragOver" class="text-3xl z-30 text-white">Drop here</p>
            </BaseDefaultCanvas>
        </VueFlow>
    </CanvasBuilderLayout>
</template>
