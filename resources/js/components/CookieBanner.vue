<script setup>
import { ref } from 'vue';

// Estado para controlar si las cookies han sido aceptadas
const cookiesAccepted = ref(localStorage.getItem('cookiesAccepted') === 'true');

// Función para aceptar cookies
const acceptCookies = () => {
  localStorage.setItem('cookiesAccepted', 'true');
  cookiesAccepted.value = true;
};
</script>
<template>
  <div v-if="!cookiesAccepted" class="fixed bottom-0 left-0 right-0 bg-gray-800 text-white p-4 shadow-lg">
    <div class="container mx-auto flex justify-between items-center">
      <p class="text-sm">
        Usamos cookies para mejorar tu experiencia. Al continuar navegando, aceptas nuestro uso de cookies.
      </p>
      <button
        @click="acceptCookies"
        class="ml-4 px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition duration-300"
      >
        Aceptar
      </button>
    </div>
  </div>
</template>



<style scoped>
/* Puedes personalizar el estilo del banner aquí */
</style>