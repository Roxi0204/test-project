<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head, Link } from '@inertiajs/vue3';
import PlaceholderPattern from '../components/PlaceholderPattern.vue';



const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Ciclos formativos',
        href: '/CicloFormativo',
    }
];
</script>

<template>
    <Head title="Ciclos formativos" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="bg-gradient-to-br from-blue-100 to-indigo-200 min-h-screen">
            <div class="py-16">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white/90 overflow-hidden shadow-xl sm:rounded-lg z-0  transition-all duration-300 hover:shadow-2xl">
                        <div class="p-8 text-gray-800">
                            <div class="text-center space-y-8">
                                <h1 class="text-6xl font-extrabold text-gray-900 mb-8 tracking-tight">
                                    <span class="bg-clip-text text-transparent bg-gradient-to-r from-blue-600 to-indigo-600">
                                        Ciclos formativos
                                    </span>
                                </h1>
                                <p class="text-xl text-gray-700 max-w-3xl mx-auto leading-relaxed">
                                    Bienvenido a nuestra plataforma de ciclos formativos
                                </p>
                                <div class="mt-8">
                                    <Link class="px-8 py-3 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg shadow-md transition-all duration-300 transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50"
                                        :href="route('cicloformativos.index')" :active="route().current('dashboard')">
                                        Comenzar
                                </Link>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
