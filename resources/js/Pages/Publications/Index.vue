<script setup>
import { Head, Link } from '@inertiajs/vue3';
import PublicLayout from '@/Layouts/PublicLayout.vue';

defineProps({
    settings: Object,
    publications: Object,
});
</script>

<template>
    <Head title="Publikasi" />
    <PublicLayout :settings="settings">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                        <div class="text-center">
                            <h1 class="text-4xl font-bold text-gray-900">Publikasi</h1>
                        </div>
                    </div>

                    <div class="p-6 sm:px-20 bg-white">
                        <ul class="divide-y divide-gray-200">
                            <li v-for="publication in publications.data" :key="publication.id" class="py-4 flex items-center justify-between">
                                <div>
                                    <h3 class="text-lg font-semibold text-gray-900">{{ publication.title }}</h3>
                                    <p class="mt-1 text-sm text-gray-600">{{ publication.description }}</p>
                                </div>
                                <a :href="`/storage/${publication.file}`" target="_blank" class="ml-4 px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700">
                                    Download
                                </a>
                            </li>
                        </ul>
                        <div class="mt-6">
                            <template v-for="link in publications.links">
                                <Link v-if="link.url" :href="link.url" v-html="link.label" class="px-4 py-2 border" :class="{ 'bg-indigo-500 text-white': link.active }"></Link>
                                <span v-else v-html="link.label" class="px-4 py-2 border text-gray-500"></span>
                            </template>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </PublicLayout>
</template>
