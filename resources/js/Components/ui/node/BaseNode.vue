<script setup>
import { ref } from 'vue';

const label = defineModel()
const input = ref(null)
</script>

<template>
    <div class="w-36 bg-white shadow-sm rounded-sm py-2 px-3" @click="input.focus()">
        <input ref="input" type="text" name="" id="" v-model="label" class="border-none focus:border-none outline-none text-xs">
    </div>
</template>
