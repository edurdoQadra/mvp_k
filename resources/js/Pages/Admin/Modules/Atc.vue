<template>
  <AdminLayout>
    <div class="flex justify-center items-center h-screen">
      <div class="w-full max-w-lg my-8">
        <div class="rounded-lg p-4 bg-gray-300">
          <label for="opciones" class="text-gray-700 font-bold mb-2 block text-center">Selecciona una opción:</label>
          <select v-model="selected" id="opciones" class="border border-gray-300 p-2 w-full">
            <option value="">Selecciona un Módulo</option>
            <option v-for="option in options" :value="option.value" :key="option.value">{{ option.text }}</option>
          </select>
        </div>
      </div>
    </div>

    <div class="flex justify-center mt-8">
      <div class="w-full max-w-lg">
        <Clientes v-if="selected === '1'" :datos="clientes"></Clientes>
        <Personas v-else-if="selected === '2'" :datos="personas"></Personas>
        <Locales v-else-if="selected === '3'" :datos="locales"></Locales>
      </div>
    </div>
  </AdminLayout>
</template>

<script setup>
import { ref } from 'vue';
import { onMounted, onBeforeMount } from 'vue';
import AdminLayout from '../../../Layouts/AdminLayout.vue';
import Clientes from '../../../Pages/Admin/Clients/Index.vue';
import Personas from '../../../Pages/Admin/Persons/Index.vue';
import Locales from '../../../Pages/Admin/Stores/Index.vue';

let clientes = ref([]);
let personas = ref([]);
let locales = ref([]);

const props = defineProps({
  clientes: Array,
  locales: Array,
  personas: Array
});

const options = [
  { value: '1', text: 'Clientes' },
  { value: '2', text: 'Personas' },
  { value: '3', text: 'Locales' }
];

let selected = ref('');

onBeforeMount(() => {
  if (props.clientes && props.locales && props.personas) {
    clientes.value = props.clientes;
    personas.value = props.personas;
    locales.value = props.locales;
  } else {
    console.error('No se recibieron datos válidos desde Inertia:', props.clientes);
  }
});

onMounted(() => {
  console.log('Datos recibidos desde Inertia:', props.clientes, props.locales, props.personas);
});
</script>

<style scoped>
/* Estilos opcionales si es necesario */
</style>
