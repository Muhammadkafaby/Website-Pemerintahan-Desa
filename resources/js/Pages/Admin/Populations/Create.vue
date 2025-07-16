<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import InputLabel from '@/Components/InputLabel.vue';
import InputError from '@/Components/InputError.vue';

const form = useForm({
    name: '',
    nik: '',
    gender: 'Laki-laki',
    age: '',
    education: '',
    occupation: '',
    religion: '',
});

const submit = () => {
    form.post(route('admin.populations.store'));
};
</script>

<template>
    <Head title="Tambah Penduduk" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Tambah Penduduk</h2>
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
                                <InputLabel for="nik" value="NIK" />
                                <TextInput id="nik" type="text" class="mt-1 block w-full" v-model="form.nik" required />
                                <InputError class="mt-2" :message="form.errors.nik" />
                            </div>

                            <div class="mt-4">
                                <InputLabel for="gender" value="Jenis Kelamin" />
                                <select id="gender" class="mt-1 block w-full" v-model="form.gender">
                                    <option>Laki-laki</option>
                                    <option>Perempuan</option>
                                </select>
                                <InputError class="mt-2" :message="form.errors.gender" />
                            </div>

                            <div class="mt-4">
                                <InputLabel for="age" value="Usia" />
                                <TextInput id="age" type="number" class="mt-1 block w-full" v-model="form.age" required />
                                <InputError class="mt-2" :message="form.errors.age" />
                            </div>

                            <div class="mt-4">
                                <InputLabel for="education" value="Pendidikan" />
                                <TextInput id="education" type="text" class="mt-1 block w-full" v-model="form.education" required />
                                <InputError class="mt-2" :message="form.errors.education" />
                            </div>

                            <div class="mt-4">
                                <InputLabel for="occupation" value="Pekerjaan" />
                                <TextInput id="occupation" type="text" class="mt-1 block w-full" v-model="form.occupation" required />
                                <InputError class="mt-2" :message="form.errors.occupation" />
                            </div>

                            <div class="mt-4">
                                <InputLabel for="religion" value="Agama" />
                                <TextInput id="religion" type="text" class="mt-1 block w-full" v-model="form.religion" required />
                                <InputError class="mt-2" :message="form.errors.religion" />
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
