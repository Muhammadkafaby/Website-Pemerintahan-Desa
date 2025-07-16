<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
import PrimaryButton from '@/Components/PrimaryButton.vue';

const props = defineProps({
    populations: Object,
});
</script>

<template>
    <Head title="Kependudukan" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Kependudukan</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div class="flex justify-between mb-6">
                            <h3 class="text-2xl font-bold">Data Penduduk</h3>
                            <Link :href="route('admin.populations.create')">
                                <PrimaryButton>Tambah</PrimaryButton>
                            </Link>
                        </div>
                        <table class="min-w-full">
                            <thead>
                                <tr>
                                    <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-gray-600 uppercase tracking-wider">Nama</th>
                                    <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-gray-600 uppercase tracking-wider">NIK</th>
                                    <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-gray-600 uppercase tracking-wider">Jenis Kelamin</th>
                                    <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-gray-600 uppercase tracking-wider">Usia</th>
                                    <th class="px-6 py-3 border-b-2 border-gray-300"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="population in populations.data" :key="population.id">
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ population.name }}</td>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ population.nik }}</td>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ population.gender }}</td>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ population.age }}</td>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-right">
                                        <Link :href="route('admin.populations.edit', population.id)" class="text-indigo-600 hover:text-indigo-900">Edit</Link>
                                        <Link :href="route('admin.populations.destroy', population.id)" method="delete" as="button" class="text-red-600 hover:text-red-900 ml-4">Hapus</Link>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
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
    </AuthenticatedLayout>
</template>
