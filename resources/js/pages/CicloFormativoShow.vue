<script setup>
import { Head } from '@inertiajs/vue3';
import { Link } from '@inertiajs/vue3';
import Axios from 'axios';
import { defineProps } from 'vue';
import { router } from '@inertiajs/vue3';
import AuthenticatedLayout from '@/layouts/AuthenticatedLayout.vue';



const props = defineProps({
    cicloformativo: {
        type: Object,
        required: true,
    },
    authenticatedUser: Object,
});

console.log(props.authenticatedUser.id);
console.log(props.cicloformativo)

const formatDate = (date) => {
    return new Date(date).toLocaleDateString('es-ES', {
        year: 'numeric',
        month: 'long',
        day: 'numeric',
    });
};

const deletecicle = (id) => {
    if (confirm('¿Estás seguro de que deseas eliminar este anuncio?')) {
        Axios.post(route('cicloformativos.destroy', id))
            .then(() => {
                router.get(route('cicloformativos.index'), {
                });
            })
            .catch((error) => {
                console.error('Error al eliminar el anuncio:', error);
            });
    }
};
</script>

<template>
    <Head :title="`Anuncio - ${props.cicloformativo.name}`" />
    <AuthenticatedLayout>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h1 class="text-2xl font-bold mb-4">Titulo: {{ props.cicloformativo.name }}</h1>
                        <p class="text-gray-700 mb-4">Descripcion: {{ props.cicloformativo.description }}</p>
                        <p class="text-gray-700 mb-4">Nivel: {{ props.cicloformativo.level }}</p>
                        <p class="text-gray-700 mb-4">Opinion personal: {{ props.cicloformativo.personalopinion }}</p>
                        <p class="text-gray-700 mb-4">Valoracion: {{ props.cicloformativo.valuation }}</p>
                        <p class="text-gray-700 mb-4">Correo de contacto: {{ props.cicloformativo.email_contact }}</p>
                        <p class="text-gray-700 mb-4">Ciclo: {{ props.cicloformativo.ciclo.name }}</p>
                        <p class="text-sm text-gray-500">Publicado el: {{ formatDate(props.cicloformativo.created_at) }}</p>

                        <!-- Botones de Editar y Borrar -->
                        <div class="flex space-x-4 mt-6">
                            <div v-if="props.authenticatedUser.id === props.cicloformativo.user.id ">
                                <Link :href="route('cicloformativos.edit', props.cicloformativo.id)"
                                    class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 ml-2 mr-2"
                                >
                                    Editar
                                </Link>
                                <button
                                    @click.prevent="deletecicle(props.cicloformativo.id)"
                                    class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600 ml-2"
                                >
                                    Borrar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>