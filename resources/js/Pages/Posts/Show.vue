<script setup>
import { Head } from '@inertiajs/vue3';
import PublicLayout from '@/Layouts/PublicLayout.vue';

defineProps({
    settings: Object,
    post: Object,
});
</script>

<template>
    <Head :title="post.title" />
    <PublicLayout :settings="settings">
        <div class="bg-gray-50 py-16">
            <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
                <article class="bg-white rounded-2xl shadow-2xl overflow-hidden">
                    <div>
                        <img class="w-full h-[450px] object-cover" :src="`/storage/${post.image}`" :alt="post.title">
                    </div>
                    <div class="p-8 lg:p-12">
                        <h1 class="text-5xl md:text-6xl font-extrabold text-gray-900 leading-tight mb-4">{{ post.title }}</h1>
                        <div class="flex items-center text-gray-500 mb-8">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                            <span class="font-medium">{{ post.user ? post.user.name : 'Pengguna yang dihapus' }}</span>
                            <span class="mx-2">&bull;</span>
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            <time :datetime="post.created_at">{{ new Date(post.created_at).toLocaleDateString('id-ID', { day: 'numeric', month: 'long', year: 'numeric' }) }}</time>
                        </div>
                        <div class="prose prose-lg max-w-none text-gray-700 leading-relaxed" v-html="post.content"></div>
                    </div>
                </article>
            </div>
        </div>
    </PublicLayout>
</template>
