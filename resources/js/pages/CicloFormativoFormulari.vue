<script setup>
import { reactive } from 'vue';
import { Head, useForm } from '@inertiajs/vue3';
import { Link } from '@inertiajs/vue3';

const form = useForm({
    name: '',
    level: '',
    description: '',
    profesionalfamily:'',
    valuation:'',
    personalopinion:'',
  
   
});
const props = defineProps({
    ciclos: {
        type: Array,
        required: true,
    },
});

function submitForm() {
   form.post(route('cicloformativo.store'), {
       
    });
    form.name = '';
    form.description = '';

}
</script>
<template>
    <div class="max-w-2xl mx-auto p-6 bg-white shadow-md rounded mt-16">
        <h1 class="text-2xl font-bold mb-4 text-center">Crear un nuevo ciclo formativo</h1>
        <form @submit.prevent="submitForm" class="space-y-4">
         
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Nombre</label>
                <input
                    type="text"
                    id="name"
                    v-model="form.name"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                    placeholder="Escribe el título del ciclo formativo"
                    required
                    aria-required="true"
                />
            </div>

        
            <div>
                <label for="content" class="block text-sm font-medium text-gray-700">Nivel</label>
                <textarea
                    id="content"
                    v-model="form.level"
                    rows="4"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                    placeholder="Escribe el nivel"
                    required
                    aria-required="true"
                ></textarea>
            </div>

            <!-- Categoría -->
            <div>
                <label for="category" class="block text-sm font-medium text-gray-700">Familia</label>
                <select
                    id="category"
                    v-model="form.profesionalfamily"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                    required
                    aria-required="true"
                >
                    <option value="" disabled>Selecciona un ciclo</option>
                    <option v-for="ciclo in props.ciclos" :key="ciclo.id" :value="ciclo.id">
                        {{ ciclo.name }}
                    </option>
                </select>
            </div>

            <!-- Email -->
            <div>
                <label for="valuation" class="block text-sm font-medium text-gray-700">Valoracion</label>
                <input
                    type="valuation"
                    id="valuation"
                    v-model="form.valuation"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                    placeholder="Escribe la valoracion"
                    required
                    aria-required="true"
                />
            </div>
            <div>
                <label for="valuation" class="block text-sm font-medium text-gray-700">Opinion personal</label>
                <input
                    type="valuation"
                    id="valuation"
                    v-model="form.personalopinion"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                    placeholder="Escribe la opinion personal"
                    required
                    aria-required="true"
                />
            </div>

            <!-- Botón de envío -->
            <div class="flex justify-center">
                <button
                    type="submit"
                    class="px-6 py-2 bg-indigo-600 text-white font-semibold rounded hover:bg-indigo-700 focus:ring-2 focus:ring-indigo-500 focus:outline-none transition duration-300"
                    aria-label="Crear un nuevo anuncio"
                >
                    Crear Ciclo formativo
                </button>
            </div>
        </form>
    </div>
</template>

