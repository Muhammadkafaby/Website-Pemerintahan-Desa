<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
import PrimaryButton from '@/Components/PrimaryButton.vue';

const props = defineProps({
    governments: Object,
});
</script>

<template>
    <Head title="Pemerintahan" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Pemerintahan</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div class="flex justify-between mb-6">
                            <h3 class="text-2xl font-bold">Daftar Aparatur Desa</h3>
                            <Link :href="route('admin.governments.create')">
                                <PrimaryButton>Tambah</PrimaryButton>
                            </Link>
                        </div>
                        <table class="min-w-full">
                            <thead>
                                <tr>
                                    <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-gray-600 uppercase tracking-wider">Nama</th>
                                    <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-gray-600 uppercase tracking-wider">Jabatan</th>
                                    <th class="px-6 py-3 border-b-2 border-gray-300"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="government in governments" :key="government.id">
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ government.name }}</td>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ government.position }}</td>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-right">
                                        <Link :href="route('admin.governments.edit', government.id)" class="text-indigo-600 hover:text-indigo-900">Edit</Link>
                                        <Link :href="route('admin.governments.destroy', government.id)" method="delete" as="button" class="text-red-600 hover:text-red-900 ml-4">Hapus</Link>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
