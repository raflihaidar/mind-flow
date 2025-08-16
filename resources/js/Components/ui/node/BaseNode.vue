<script setup>
import { useNode, Handle, Position, useVueFlow } from '@vue-flow/core';
import { ref, toRefs, watch, onMounted, onBeforeUnmount, nextTick } from 'vue';
import { route } from 'ziggy-js';
import { router } from '@inertiajs/vue3'

const label = defineModel()

const {removeNodes} = useVueFlow()

const props = defineProps({
    id : String,
    data : Object,
})
const {data} = toRefs(props)
const isDisabled = ref(true)
const isShowOption = ref(false)
const input = ref()

const updateData = (event) => {
    const target = event.target
    data.value.label = target.value
}

const handleClick = () => {
    // console.log('Double click terdeteksi')
    isDisabled.value = false
    nextTick(() => {
        input.value.focus()
    })
}

// watch(() => data.value, (newVal) => {
//     console.log("value node text : ", newVal)
// }, {deep : true, immediate : true})

const handleClickOutside = (event) => {
  if (input.value && !input.value.contains(event.target)) {
    isDisabled.value = true
    isShowOption.value = false

  }
}

function deleteNode() {
  removeNodes([props.id])
}

const showOption = (e) => {
    e.preventDefault()
    isShowOption.value = true
}

onMounted(() => {
  document.addEventListener('click', handleClickOutside)
})

onBeforeUnmount(() => {
  document.removeEventListener('click', handleClickOutside)
})
</script>

<template>
    <div
      class="w-36 bg-white shadow-sm rounded-sm block relative"
      @dblclick="handleClick"
      @contextmenu="showOption"
    >
    <input
        ref="input"
        type="text"
        :disabled="isDisabled"
        :class="['outline-none text-xs w-full py-2 px-3 text-center', isDisabled ? 'pointer-events-none border-none ' : 'border-blue-900 border']"
        :value="data?.label"
        @input="updateData($event)"
    />
    <Handle type="source" :position="Position.Right" />
    <Handle type="target" :position="Position.Left" />
        <ul class="bg-white z-50 text-black border absolute -right-13 top-[70%] p-2 rounded-sm" v-if="isShowOption">
            <li class="text-xs text-red-500 font-medium" @click="deleteNode">Delete</li>
        </ul>
    </div>
  </template>
