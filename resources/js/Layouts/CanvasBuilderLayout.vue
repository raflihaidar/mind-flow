<script setup>
import BaseBuilderSidebar from '@/Components/shared/BaseBuilderSidebar.vue';
import BaseHeader from '@/Components/shared/BaseHeader.vue';
import { useToast } from "vue-toastification";
import { usePage } from '@inertiajs/vue3'
import BaseHeaderBuilder from '@/Components/shared/BaseHeaderBuilder.vue';
import { onMounted, ref, toRefs, watch, reactive, markRaw, computed, nextTick } from 'vue'
import { Head, router, useForm } from '@inertiajs/vue3';
import { VueFlow, useVueFlow } from '@vue-flow/core'
import SpecialEdge from '@/Components/ui/edge/SpecialEdge.vue'
import SpecialNode from '@/Components/ui/node/SpecialNode.vue'
import Button from '@/Components/ui/button/Button.vue'
import CanvasBuilderLayout from '@/Layouts/CanvasBuilderLayout.vue';
import BaseDefaultCanvas from '@/Components/shared/BaseDefaultCanvas.vue';
import useDragAndDrop from '@/Composables/UseDnD';
import BaseNode from '@/Components/ui/node/BaseNode.vue';
import { Icon } from '@iconify/vue';

const toast = useToast();

const props = defineProps({
    mode : String,
    data : Object
})

const isReadOnly = ref(true)
const titleInput = ref()

const data = reactive({
    title : 'document',
    nodes: [],
    edges: []
})

onMounted(() => {
    if(props.data){
        Object.assign(data, props.data)
    }
})

const handleSave = () => {
  if(props.mode === 'edit') router.put(`/mindMap/${props.data.id}`, data)
  else router.post(`/mindMap`, data)

  console.log("data : ", data)
}

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
    onNodesChange,
    onConnect,
    addEdges
} = useVueFlow()

const { onDragOver, onDrop, onDragLeave, isDragOver } = useDragAndDrop()

const page = usePage()

const getLastId = computed({
    get() {
        if (data.nodes.length <= 0) return 0

        const lastNode = data.nodes.at(-1)

        return lastNode?.id
    },
    set(newValue) { }
})

const alert = ref({
    success: null,
    error: null
})

const successMessage = ref(page.props.flash.success)
const errorMessage = ref(page.props.flash.error)

const handleClick = () => {
    // console.log('Double click terdeteksi')
    isReadOnly.value = false
    nextTick(() => {
        titleInput.value.focus()
    })
}

onEdgeClick((event, edge) => {
    console.log('edge clicked', edge)
})

const handleDropNode = (event) => {
    const { newNode } = onDrop(event, getLastId)
    data.nodes.push(newNode)
}

const handleNodeClick = ({ node }) => {
    console.log('Clicked node ID:', node.id);
};

onConnect(addEdges)

const nodeTypes = {
    custom: markRaw(BaseNode)
}

// const onNodeDragStop = (event, node) => {
//   console.log("Node selesai dipindahkan:", node)
// }

// Watch untuk success
watch(
    () => page.props.flash.success,
    (val) => {
        if (val) {
            toast.success(val)
        }
    }
)

// Watch untuk error
watch(
    () => page.props.flash.error,
    (val) => {
        if (val) {
            toast.error(val)
        }
    }
)
</script>

<template>
    <div class="w-screen h-screen dnd-flow relative bg-[#f9f7f1]" @drop="handleDropNode($event)">
        <BaseBuilderSidebar />

        <div class="flex w-64 items-center gap-x-2 absolute top-5 left-5 py-3 px-5 rounded-xl z-50 bg-white/80 shadow-sm">
            <Button size="icon" @click="router.get('/')" class="cursor-pointer">
                <Icon icon="mdi:chevron-left" class="size-8"/>
            </Button>

            <input ref="titleInput"
            @dblclick="handleClick"
            v-model="data.title"
            :class="[
            isReadOnly ? 'border-none' : 'border border-black','outline-none text-lg w-full px-1'
            ]"
            :readonly="isReadOnly"
            />
        </div>

        <!-- Main content -->
        <div class="w-full h-full overflow-hidden">
            <VueFlow
                :node-types="nodeTypes"
                v-model:nodes="data.nodes"
                v-model:edges="data.edges"
                @nodeClick="handleNodeClick"
                @dragover="onDragOver"
                @dragleave="onDragLeave"
                :default-viewport="{ zoom: 1.5 }"
                >
                <BaseDefaultCanvas>
                    <BaseHeaderBuilder @save="handleSave"/>
                    <!-- <p v-if="isDragOver" class="text-3xl z-30 text-white">Drop here</p> -->
                </BaseDefaultCanvas>
            </VueFlow>
        </div>
    </div>
</template>
