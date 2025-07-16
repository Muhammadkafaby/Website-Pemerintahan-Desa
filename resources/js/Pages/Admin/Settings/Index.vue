<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import InputLabel from '@/Components/InputLabel.vue';
import InputError from '@/Components/InputError.vue';

const props = defineProps({
    settings: Object,
});

const form = useForm({
    village_name: props.settings.village_name,
    logo: null,
    contact: props.settings.contact,
    social_media: props.settings.social_media,
    hero_banner: null,
    primary_color: props.settings.primary_color,
});

const submit = () => {
    form.post(route('admin.settings.store'));
};
</script>

<template>
    <Head title="Settings" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Settings</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <form @submit.prevent="submit">
                            <div>
                                <InputLabel for="village_name" value="Nama Desa" />
                                <TextInput id="village_name" type="text" class="mt-1 block w-full" v-model="form.village_name" required autofocus />
                                <InputError class="mt-2" :message="form.errors.village_name" />
                            </div>

                            <div class="mt-4">
                                <InputLabel for="logo" value="Logo" />
                                <input type="file" @input="form.logo = $event.target.files[0]" />
                                <InputError class="mt-2" :message="form.errors.logo" />
                            </div>

                            <div class="mt-4">
                                <InputLabel for="contact" value="Kontak" />
                                <TextInput id="contact" type="text" class="mt-1 block w-full" v-model="form.contact" />
                                <InputError class="mt-2" :message="form.errors.contact" />
                            </div>

                            <div class="mt-4">
                                <InputLabel for="social_media" value="Media Sosial (JSON)" />
                                <textarea id="social_media" class="mt-1 block w-full" v-model="form.social_media"></textarea>
                                <InputError class="mt-2" :message="form.errors.social_media" />
                            </div>

                            <div class="mt-4">
                                <InputLabel for="hero_banner" value="Banner Hero" />
                                <input type="file" @input="form.hero_banner = $event.target.files[0]" />
                                <InputError class="mt-2" :message="form.errors.hero_banner" />
                            </div>

                            <div class="mt-4">
                                <InputLabel for="primary_color" value="Warna Utama" />
                                <TextInput id="primary_color" type="color" class="mt-1 block" v-model="form.primary_color" />
                                <InputError class="mt-2" :message="form.errors.primary_color" />
                            </div>

                            <div class="flex items-center justify-end mt-4">
                                <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                                    Save
                                </PrimaryButton>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
