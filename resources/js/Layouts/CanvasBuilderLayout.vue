<script setup>
import { ref, watch } from 'vue'
import BaseBuilderSidebar from '@/Components/shared/BaseBuilderSidebar.vue';
import BaseFooter from '@/Components/shared/BaseFooter.vue';
import BaseHeader from '@/Components/shared/BaseHeader.vue';
import { useToast } from "vue-toastification";
import { usePage } from '@inertiajs/vue3'

const toast = useToast();


const page = usePage()

const alert = ref({
    success : null,
    error : null
})

const successMessage = ref(page.props.flash.success)
const errorMessage = ref(page.props.flash.error)


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
    <div class="grid grid-cols-[16rem_1fr] h-screen">
      <!-- Sidebar -->
      <aside class="bg-gray-800 text-white p-4">
        <BaseBuilderSidebar />
      </aside>

      <!-- Main content -->
      <div class="grid grid-rows-[4rem_1fr]">
        <header class="bg-gray-200 p-4">
          Header
        </header>

        <!-- Scrollable content -->
        <main class="overflow-y-auto bg-gray-100">
          <slot/>
        </main>
      </div>
    </div>
  </template>
