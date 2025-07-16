<script setup>
import { Head, Link } from '@inertiajs/vue3';
import PublicLayout from '@/Layouts/PublicLayout.vue';

defineProps({
    settings: Object,
    populations: Object,
});
</script>

<template>
    <Head title="Kependudukan" />
    <PublicLayout :settings="settings">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                        <div class="text-center">
                            <h1 class="text-4xl font-bold text-gray-900">Data Kependudukan</h1>
                        </div>
                    </div>

                    <div class="p-6 sm:px-20 bg-white">
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">NIK</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jenis Kelamin</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Usia</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Pendidikan</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Pekerjaan</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Agama</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    <tr v-for="population in populations.data" :key="population.id">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ population.name }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ population.nik }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ population.gender }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ population.age }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ population.education }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ population.occupation }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ population.religion }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="mt-6">
                            <template v-for="link in populations.links">
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
