<script setup>
import { Head } from '@inertiajs/vue3';
import PublicLayout from '@/Layouts/PublicLayout.vue';

defineProps({
    settings: Object,
    bumdes: Object,
});
</script>

<template>
    <Head title="BUMDes" />
    <PublicLayout :settings="settings">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                        <div class="text-center">
                            <h1 class="text-4xl font-bold text-gray-900">BUMDes</h1>
                        </div>
                    </div>

                    <div class="p-6 sm:px-20 bg-white grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                        <div v-for="item in bumdes" :key="item.id" class="bg-gray-50 rounded-lg shadow-md p-6">
                            <img class="h-48 w-full object-cover rounded-t-lg" :src="`/storage/${item.image}`" alt="">
                            <div class="pt-6">
                                <h3 class="text-xl font-semibold text-gray-900">{{ item.name }}</h3>
                                <p class="mt-2 text-gray-600">{{ item.contact }}</p>
                                <div class="mt-4 text-sm text-gray-500" v-html="item.description"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </PublicLayout>
</template>
