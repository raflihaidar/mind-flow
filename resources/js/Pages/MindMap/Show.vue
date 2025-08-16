<script setup>
import CanvasBuilderLayout from '@/Layouts/CanvasBuilderLayout.vue'
import { onMounted, reactive } from 'vue'

const props = defineProps({
    data: Object
})
</script>


<template>
    <CanvasBuilderLayout
    class="dnd-flow"
    mode="edit"
    :data="props.data"
    >
    </CanvasBuilderLayout>
</template>
