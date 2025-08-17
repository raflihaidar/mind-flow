<script setup>
    import { Avatar, AvatarFallback, AvatarImage } from '@/Components/ui/avatar'
</script>

<template>
    <nav class="w-full shadow-sm flex items-center justify-between py-5 px-10">
        <section>
            <h1 class="text-2xl font-semibold">Mind<span class="text-yellow-500">Flow</span></h1>
        </section>

        <section class="flex items-center gap-x-5">
            <p class="font-medium">Admin</p>

            <Avatar class="cursor-pointer">
                <AvatarImage src="https://github.com/unovue.png" alt="@unovue" />
                <AvatarFallback>CN</AvatarFallback>
            </Avatar>
        </section>
    </nav>
</template>
