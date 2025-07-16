<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import InputLabel from '@/Components/InputLabel.vue';
import InputError from '@/Components/InputError.vue';

const props = defineProps({
    profile: Object,
});

const form = useForm({
    history: props.profile.history,
    vision_and_mission: props.profile.vision_and_mission,
    location: props.profile.location,
    geography: props.profile.geography,
});

const submit = () => {
    form.post(route('admin.village-profile.store'));
};
</script>

<template>
    <Head title="Profil Desa" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Profil Desa</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <form @submit.prevent="submit">
                            <div>
                                <InputLabel for="history" value="Sejarah" />
                                <textarea id="history" class="mt-1 block w-full" v-model="form.history"></textarea>
                                <InputError class="mt-2" :message="form.errors.history" />
                            </div>

                            <div class="mt-4">
                                <InputLabel for="vision_and_mission" value="Visi dan Misi" />
                                <textarea id="vision_and_mission" class="mt-1 block w-full" v-model="form.vision_and_mission"></textarea>
                                <InputError class="mt-2" :message="form.errors.vision_and_mission" />
                            </div>

                            <div class="mt-4">
                                <InputLabel for="location" value="Lokasi" />
                                <textarea id="location" class="mt-1 block w-full" v-model="form.location"></textarea>
                                <InputError class="mt-2" :message="form.errors.location" />
                            </div>

                            <div class="mt-4">
                                <InputLabel for="geography" value="Geografis" />
                                <textarea id="geography" class="mt-1 block w-full" v-model="form.geography"></textarea>
                                <InputError class="mt-2" :message="form.errors.geography" />
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
