<script setup>
import Button from '@/Components/ui/button/Button.vue';
import { Icon } from '@iconify/vue';
import { router } from '@inertiajs/vue3';

const emits = defineEmits(['save'])

const handleSave = () => {
    emits('save')
}
</script>

<template>
    <div class="flex items-center justify-end p-10 z-50 bg-transparent">
        <!-- <section class="z-50">
            <div class="bg-white gap-x-5 py-4 px-6  rounded-full shadow-[0_4px_6px_rgba(0,0,0,0.1),0_1px_3px_rgba(0,0,0,0.08)] flex items-center">
                <p>undo</p>
                <p>redo</p>
                <p>copy</p>
                <p>delete</p>
            </div>
        </section> -->

        <Button
        @click="handleSave"
         class="w-auto rounded-full hover:bg-slate-300 bg-white shadow-[0_4px_6px_rgba(0,0,0,0.1),0_1px_3px_rgba(0,0,0,0.08)] text-gray-700 font-medium h-auto py-4 px-6 cursor-pointer hover:scale-105 transition-transform z-50"
        >
            Save Changes
        </Button>
    </div>
</template>
