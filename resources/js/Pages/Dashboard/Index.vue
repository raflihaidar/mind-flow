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

const props = defineProps({
    title: String,
    data: Array
})

const createMindMap = () => {
    router.get('/mindMap/create')
}
</script>

<template>
    <Head :title="title" />

    <div class="p-5">
        <h1 class="mb-5 font-semibold">List Mind Map</h1>
        <div class="grid grid-cols-5">
            <Card
            v-for="(item, index) in data"
            :key="index"
            class="cursor-pointer hover:scale-105 transition-transform"
            @click="router.get(`/mindMap/${item.id}`)"
            >
                <CardHeader>
                    <CardTitle>{{ item.title }}</CardTitle>
                </CardHeader>
                <CardContent>
                    Dibuat oleh : <span class="font-medium">{{ item.creator.username }}</span>
                </CardContent>
            </Card>
        </div>
    </div>

    <Button
        @click="createMindMap"
        class="w-auto h-auto rounded-full fixed bottom-10 right-10 p-3 cursor-pointer hover:scale-105 transition-transform"
        size="icon"
    >
        <Icon icon="material-symbols:add-2-rounded" class="size-8" />
    </Button>

</template>
