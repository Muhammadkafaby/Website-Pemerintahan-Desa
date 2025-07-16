<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import InputLabel from '@/Components/InputLabel.vue';
import InputError from '@/Components/InputError.vue';

const form = useForm({
    name: '',
    position: '',
    photo: null,
    history: '',
});

const submit = () => {
    form.post(route('admin.governments.store'));
};
</script>

<template>
    <Head title="Tambah Aparatur Desa" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Tambah Aparatur Desa</h2>
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
                                <InputLabel for="position" value="Jabatan" />
                                <TextInput id="position" type="text" class="mt-1 block w-full" v-model="form.position" required />
                                <InputError class="mt-2" :message="form.errors.position" />
                            </div>

                            <div class="mt-4">
                                <InputLabel for="photo" value="Foto" />
                                <input type="file" @input="form.photo = $event.target.files[0]" />
                                <InputError class="mt-2" :message="form.errors.photo" />
                            </div>

                            <div class="mt-4">
                                <InputLabel for="history" value="Riwayat" />
                                <textarea id="history" class="mt-1 block w-full" v-model="form.history"></textarea>
                                <InputError class="mt-2" :message="form.errors.history" />
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
