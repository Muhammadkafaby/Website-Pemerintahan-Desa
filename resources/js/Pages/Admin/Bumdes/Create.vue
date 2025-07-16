<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import InputLabel from '@/Components/InputLabel.vue';
import InputError from '@/Components/InputError.vue';

const form = useForm({
    name: '',
    description: '',
    image: null,
    contact: '',
});

const submit = () => {
    form.post(route('admin.bumdes.store'));
};
</script>

<template>
    <Head title="Tambah BUMDes" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Tambah BUMDes</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <form @submit.prevent="submit">
                            <div>
                                <InputLabel for="name" value="Nama" />
                                <TextInput id="name" type="text" class="mt-1 block w-full" v-model="form.name" required autofocus />
                                <InputError class="mt-2" :message="form.errors.name" />
                            </div>

                            <div class="mt-4">
                                <InputLabel for="description" value="Deskripsi" />
                                <textarea id="description" class="mt-1 block w-full" v-model="form.description"></textarea>
                                <InputError class="mt-2" :message="form.errors.description" />
                            </div>

                            <div class="mt-4">
                                <InputLabel for="image" value="Gambar" />
                                <input type="file" @input="form.image = $event.target.files[0]" />
                                <InputError class="mt-2" :message="form.errors.image" />
                            </div>

                            <div class="mt-4">
                                <InputLabel for="contact" value="Kontak" />
                                <TextInput id="contact" type="text" class="mt-1 block w-full" v-model="form.contact" />
                                <InputError class="mt-2" :message="form.errors.contact" />
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
