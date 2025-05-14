<script setup>
import AuthenticatedLayout from '@/layouts/AuthenticatedLayout.vue';
import { reactive } from 'vue';
import { Head, useForm } from '@inertiajs/vue3';
import { Link } from '@inertiajs/vue3';
import { onMounted } from 'vue';
import CicloFormativo from './CicloFormativo.vue';




const props = defineProps({
    ciclos: {
        type: Array,
        required: true,
    },
    cicloformativo: {
        type: Object,
        required: true,
    },
});

console.log(props.cicloformativo);
const form = useForm({
    name: '',
    level: '',
    description: '', 
    valuation: '', 
    personalopinion: '',
    cicle: '',
    email_contact: '', 
    
});

onMounted(() => {
    form.name = props.cicloformativo.name;
    form.level = props.cicloformativo.level;
    form.description = props.cicloformativo.description;
    form.valuation = props.cicloformativo.valuation;
    form.personalopinion = props.cicloformativo.personalopinion;
    form.cicle = props.cicloformativo.ciclo.id;
    form.email_contact = props.cicloformativo.email_contact;

});

function submitForm($id) {
    form.post(route('cicloformativos.update',$id), {});
}
</script>

<template>
    <AuthenticatedLayout>

    <div class="max-w-2xl mx-auto p-6 bg-white shadow-md rounded">
        <h1 class="text-2xl font-bold mb-4">Editar Anuncio</h1>
        <form @submit.prevent="submitForm(props.cicloformativo.id)">
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Nombre</label>
                <input
                    type="text"
                    id="name"
                    v-model="form.name"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                    placeholder="Escribe el nombre del ciclo formativo"
                    required
                />
            </div>
            <div class="mb-4">
                <label for="level" class="block text-sm font-medium text-gray-700">Nivel</label>
                <textarea
                    id="level"
                    v-model="form.level"
                    rows="4"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                    placeholder="Escribe el contenido del anuncio"
                    required
                ></textarea>
            </div>
            <div class="mb-4">
                <label for="ciclos" class="block text-sm font-medium text-gray-700">Ciclo</label>
                <select
                    id="ciclos"
                    v-model="form.cicle"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                    required
                >
                    <option value="" disabled>Selecciona una categoría</option>
                    <option v-for="ciclo in props.ciclos" :key="ciclo.id" :value="ciclo.id">
                        {{ ciclo.name }}
                    </option>
                </select>
            </div>
            <div class="mb-4">
                <label for="email_contact" class="block text-sm font-medium text-gray-700">Email de contacto</label>
                <input
                    type="text"
                    id="email_contact"
                    v-model="form.email_contact"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                    placeholder="Escribe el email"
                    required
                />
            </div>
            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-700">Descripción</label>
                <textarea
                    id="description"
                    v-model="form.description"
                    rows="4"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                    placeholder="Escribe la descripción del ciclo formativo"
                    required
                ></textarea>
            </div>
            <div class="mb-4">
                <label for="valuation" class="block text-sm font-medium text-gray-700">Valoración</label>
                <textarea
                    id="valuation"
                    v-model="form.valuation"
                    rows="4"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                    placeholder="Escribe la valoración del ciclo formativo"
                    required
                ></textarea>
            </div>
            <div class="mb-4">
                <label for="personalopinion" class="block text-sm font-medium text-gray-700">Opinión personal</label>
                <textarea
                    id="personalopinion"
                    v-model="form.personalopinion"
                    rows="4"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                    placeholder="Escribe tu opinión personal"
                    required
                ></textarea>
            </div>
            <button
                type="submit"
                class="px-4 py-2 bg-indigo-600 text-white font-semibold rounded hover:bg-indigo-700"
            >
                Guardar Cambios
            </button>
        </form>
    </div>
    </AuthenticatedLayout>
</template>