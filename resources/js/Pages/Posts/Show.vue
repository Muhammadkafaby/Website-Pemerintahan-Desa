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
        <div class="py-12">
            <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <img class="w-full h-96 object-cover" :src="`/storage/${post.image}`" alt="">
                    <div class="p-6 sm:px-20 bg-white">
                        <h1 class="text-4xl font-bold text-gray-900">{{ post.title }}</h1>
                        <p class="text-gray-600 text-sm mt-2">
                            By {{ post.user.name }} on {{ new Date(post.created_at).toLocaleDateString() }}
                        </p>
                        <div class="mt-6 prose max-w-none" v-html="post.content"></div>
                    </div>
                </div>
            </div>
        </div>
    </PublicLayout>
</template>
