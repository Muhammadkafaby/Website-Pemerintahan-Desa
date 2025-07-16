<script setup>
import { Head, Link } from '@inertiajs/vue3';
import PublicLayout from '@/Layouts/PublicLayout.vue';

defineProps({
    settings: Object,
    posts: Object,
});
</script>

<template>
    <Head title="Berita" />
    <PublicLayout :settings="settings">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                        <div class="text-center">
                            <h1 class="text-4xl font-bold text-gray-900">Berita</h1>
                        </div>
                    </div>

                    <div class="p-6 sm:px-20 bg-white grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                        <div v-for="post in posts.data" :key="post.id" class="flex flex-col rounded-lg shadow-lg overflow-hidden">
                            <div class="flex-shrink-0">
                                <img class="h-48 w-full object-cover" :src="`/storage/${post.image}`" alt="">
                            </div>
                            <div class="flex-1 bg-white p-6 flex flex-col justify-between">
                                <div class="flex-1">
                                    <p class="text-sm font-medium text-indigo-600">
                                        <time :datetime="post.created_at">{{ new Date(post.created_at).toLocaleDateString() }}</time>
                                    </p>
                                    <Link :href="route('berita.show', post.slug)" class="block mt-2">
                                        <p class="text-xl font-semibold text-gray-900">{{ post.title }}</p>
                                        <p class="mt-3 text-base text-gray-500" v-html="post.content.substring(0, 100) + '...'"></p>
                                    </Link>
                                </div>
                                <div class="mt-6 flex items-center">
                                    <div class="flex-shrink-0">
                                        <span class="sr-only">{{ post.user.name }}</span>
                                        <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                                    </div>
                                    <div class="ml-3">
                                        <p class="text-sm font-medium text-gray-900">
                                            {{ post.user.name }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="p-6 sm:px-20 bg-white">
                        <div class="mt-6">
                            <template v-for="link in posts.links">
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
