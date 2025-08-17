<script setup>
import {
  Card,
  CardContent,
  CardHeader,
  CardTitle,
} from '@/Components/ui/card'
import { Icon } from "@iconify/vue";
import Button from '@/Components/ui/button/Button.vue';
import { Head, router } from '@inertiajs/vue3';
import { ref } from 'vue';

const props = defineProps({
    title: String,
    data: Array
})

const createMindMap = () => {
    router.get('/mindMap/create')
}

const isModalOpen = ref(null)

const toggleMenu = (id) => {
  isModalOpen.value = isModalOpen.value === id ? null : id
}

const deleteMindMap = (item) => {
  router.delete(`/mindMap/${item.id}`)
  isModalOpen.value = null
}
</script>

<template>
    <Head :title="title" />

    <div class="p-5">
        <h1 class="mb-5 font-semibold">List Mind Map</h1>
        <div class="grid grid-cols-1 lg:grid-cols-5 gap-x-5">
            <Card
            v-for="(item, index) in data"
            :key="index"
            class="cursor-pointer transition-transform relative py-10"
            @click="router.get(`/mindMap/${item.id}`)"
            >
                <CardHeader class="flex justify-between items-center">
                    <CardTitle>{{ item.title }}</CardTitle>
                    <div class="shadow-sm hover:bg-gray-50 rounded-full p-2 relative top-0">
                        <Icon icon="mdi:dots-vertical" class="size-6 z-50" @click.stop="toggleMenu(item.id)"/>
                        <div
                        v-if="isModalOpen === item.id"
                        class="absolute -right-20 z-20 -bottom-10 py-2 rounded-lg bg-white w-28 h-auto shadow-sm text-center">
                            <p class="w-full text-red-600 hover:text-red-700" @click.stop="deleteMindMap(item)">delete</p>
                        </div>
                    </div>
                </CardHeader>
                <!-- <CardContent>
                    Dibuat oleh : <span class="font-medium">{{ item.creator.username }}</span>
                </CardContent> -->
            </Card>
        </div>
    </div>

    <Button
        @click="createMindMap"
        class="w-auto h-auto rounded-full fixed bottom-10 right-10 p-3 cursor-pointer transition-transform"
        size="icon"
    >
        <Icon icon="material-symbols:add-2-rounded" class="size-8" />
    </Button>
</template>
