<script setup>
import { Head } from '@inertiajs/vue3';
import PublicLayout from '@/Layouts/PublicLayout.vue';

defineProps({
    settings: Object,
    profile: Object,
});
</script>

<template>
    <Head title="Profil Desa" />
    <PublicLayout :settings="settings">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                        <div class="text-center">
                            <h1 class="text-4xl font-bold text-gray-900">Profil Desa</h1>
                        </div>
                    </div>

                    <div class="p-6 sm:px-20 bg-white">
                        <div class="mt-8 text-2xl">
                            Sejarah
                        </div>
                        <div class="mt-6 text-gray-500" v-html="profile.history"></div>
                    </div>

                    <div class="p-6 sm:px-20 bg-gray-50">
                        <div class="mt-8 text-2xl">
                            Visi dan Misi
                        </div>
                        <div class="mt-6 text-gray-500" v-html="profile.vision_and_mission"></div>
                    </div>

                    <div class="p-6 sm:px-20 bg-white">
                        <div class="mt-8 text-2xl">
                            Lokasi
                        </div>
                        <div class="mt-6 text-gray-500" v-html="profile.location"></div>
                    </div>

                    <div class="p-6 sm:px-20 bg-gray-50">
                        <div class="mt-8 text-2xl">
                            Geografis
                        </div>
                        <div class="mt-6 text-gray-500" v-html="profile.geography"></div>
                    </div>
                </div>
            </div>
        </div>
    </PublicLayout>
</template>
