<script setup>
import { Head } from '@inertiajs/vue3';
import PublicLayout from '@/Layouts/PublicLayout.vue';
import { Bar, Pie } from 'vue-chartjs'
import { Chart as ChartJS, Title, Tooltip, Legend, BarElement, CategoryScale, LinearScale, ArcElement } from 'chart.js'

ChartJS.register(Title, Tooltip, Legend, BarElement, CategoryScale, LinearScale, ArcElement)

const props = defineProps({
    settings: Object,
    gender: Object,
    education: Object,
    occupation: Object,
    religion: Object,
    age: Object,
});

const genderData = {
    labels: props.gender.map(item => item.gender),
    datasets: [{
        data: props.gender.map(item => item.total),
        backgroundColor: ['#4F46E5', '#F59E0B'],
    }]
};

const educationData = {
    labels: props.education.map(item => item.education),
    datasets: [{
        data: props.education.map(item => item.total),
        backgroundColor: ['#4F46E5', '#F59E0B', '#10B981', '#EF4444', '#6366F1', '#3B82F6', '#8B5CF6'],
    }]
};

const occupationData = {
    labels: props.occupation.map(item => item.occupation),
    datasets: [{
        data: props.occupation.map(item => item.total),
        backgroundColor: ['#4F46E5', '#F59E0B', '#10B981', '#EF4444', '#6366F1', '#3B82F6', '#8B5CF6'],
    }]
};

const religionData = {
    labels: props.religion.map(item => item.religion),
    datasets: [{
        data: props.religion.map(item => item.total),
        backgroundColor: ['#4F46E5', '#F59E0B', '#10B981', '#EF4444', '#6366F1', '#3B82F6', '#8B5CF6'],
    }]
};

const ageData = {
    labels: props.age.map(item => item.age_range),
    datasets: [{
        data: props.age.map(item => item.total),
        backgroundColor: ['#4F46E5', '#F59E0B', '#10B981', '#EF4444', '#6366F1', '#3B82F6', '#8B5CF6'],
    }]
};

const chartOptions = {
    responsive: true,
    maintainAspectRatio: false
};
</script>

<template>
    <Head title="Statistik" />
    <PublicLayout :settings="settings">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                        <div class="text-center">
                            <h1 class="text-4xl font-bold text-gray-900">Statistik Desa</h1>
                        </div>
                    </div>

                    <div class="p-6 sm:px-20 bg-white grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div class="bg-gray-50 rounded-lg shadow-md p-6">
                            <h2 class="text-2xl font-bold text-center">Jenis Kelamin</h2>
                            <div class="h-64">
                                <Pie :data="genderData" :options="chartOptions" />
                            </div>
                        </div>
                        <div class="bg-gray-50 rounded-lg shadow-md p-6">
                            <h2 class="text-2xl font-bold text-center">Pendidikan</h2>
                            <div class="h-64">
                                <Bar :data="educationData" :options="chartOptions" />
                            </div>
                        </div>
                        <div class="bg-gray-50 rounded-lg shadow-md p-6">
                            <h2 class="text-2xl font-bold text-center">Pekerjaan</h2>
                            <div class="h-64">
                                <Bar :data="occupationData" :options="chartOptions" />
                            </div>
                        </div>
                        <div class="bg-gray-50 rounded-lg shadow-md p-6">
                            <h2 class="text-2xl font-bold text-center">Agama</h2>
                            <div class="h-64">
                                <Pie :data="religionData" :options="chartOptions" />
                            </div>
                        </div>
                        <div class="bg-gray-50 rounded-lg shadow-md p-6 md:col-span-2">
                            <h2 class="text-2xl font-bold text-center">Rentang Usia</h2>
                            <div class="h-64">
                                <Bar :data="ageData" :options="chartOptions" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </PublicLayout>
</template>
