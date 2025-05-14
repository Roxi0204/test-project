<script setup>
import { ref, onMounted } from "vue";


const showModal = ref(false);


const message = "Bienvenido al Dashboard, disfruta de las últimas actualizaciones.";


const closeModal = () => {
  showModal.value = false;
 
  localStorage.setItem("modalShown", "true");
};


onMounted(() => {
  const hasSeenModal = localStorage.getItem("modalShown");
  if (!hasSeenModal) {
    setTimeout(() => {
      showModal.value = true;
    }, 3000); 
  }
});
</script>

<template>
  <div v-if="showModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
    <div class="bg-white p-6 rounded-lg shadow-lg max-w-md w-full">
      <h3 class="text-xl font-bold mb-4">¡Atención!</h3>
      <p class="text-gray-600 mb-6">{{ message }}</p>
      <div class="flex justify-end">
        <button
          @click="closeModal"
          class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded"
        >
          Cerrar
        </button>
      </div>
    </div>
  </div>
</template>



<style scoped>

</style>