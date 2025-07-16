<script setup>
import { Link } from '@inertiajs/vue3';

const props = defineProps({
    settings: Object,
});
</script>

<template>
    <div class="min-h-screen bg-gray-50">
        <nav class="bg-white shadow-sm">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex items-center">
                        <Link :href="route('welcome')" class="flex items-center">
                            <img v-if="settings.logo" :src="`/storage/${settings.logo}`" alt="Logo" class="h-10 w-auto">
                            <span class="ml-3 text-xl font-bold text-gray-800">{{ settings.village_name }}</span>
                        </Link>
                    </div>
                    <div class="hidden sm:flex sm:items-center sm:ml-6">
                        <Link :href="route('welcome')" class="px-3 py-2 rounded-md text-sm font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-100">Home</Link>
                        <Link :href="route('profil-desa')" class="ml-4 px-3 py-2 rounded-md text-sm font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-100">Profil Desa</Link>
                        <Link :href="route('pemerintahan')" class="ml-4 px-3 py-2 rounded-md text-sm font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-100">Pemerintahan</Link>
                        <Link :href="route('kependudukan')" class="ml-4 px-3 py-2 rounded-md text-sm font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-100">Kependudukan</Link>
                        <Link :href="route('statistik')" class="ml-4 px-3 py-2 rounded-md text-sm font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-100">Statistik</Link>
                        <Link :href="route('berita.index')" class="ml-4 px-3 py-2 rounded-md text-sm font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-100">Berita</Link>
                        <Link :href="route('publikasi.index')" class="ml-4 px-3 py-2 rounded-md text-sm font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-100">Publikasi</Link>
                        <Link :href="route('bumdes.index')" class="ml-4 px-3 py-2 rounded-md text-sm font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-100">BUMDes</Link>
                        <Link :href="route('login')" class="ml-4 px-3 py-2 rounded-md text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700">Login</Link>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Page Content -->
        <main>
            <slot />
        </main>

        <footer class="bg-white mt-12">
            <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
                <div class="text-center text-gray-500">
                    &copy; {{ new Date().getFullYear() }} {{ settings.village_name }}. All rights reserved.
                </div>
            </div>
        </footer>
    </div>
</template>
