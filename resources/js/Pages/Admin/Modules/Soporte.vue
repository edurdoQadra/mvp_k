<template>
    <AdminLayout>
        <div class="flex justify-center items-center h-screen">
            <div class="w-full max-w-lg my-8">
          <div class="rounded-lg p-4 bg-gray-300 flex flex-col">
              <label for="opciones" class="text-gray-700 font-bold mb-2 text-center">Selecciona una opción:</label>
              <select v-model="selected" id="opciones" class="border border-gray-300 p-2 w-full">
                  <option value="">Selecciona un Modulo</option>
                  <option v-for="option in options" :value="option.value" :key="option.value">{{ option.text }}</option>
              </select>
          </div>
  
            <!-- <div class="flex justify-center w-full">
              <Dropdown align="right" width="full" class="mt-2">
                  <template #trigger>
                      <span class="inline-flex rounded-md">
                          <button
                              type="button"
                              class="inline-flex items-center px-5 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150"
                          >
                              Area Administrador Usuarios
  
                              <svg
                                  class="ml-2 -mr-0.5 h-4 w-4"
                                  xmlns="http://www.w3.org/2000/svg"
                                  viewBox="0 0 20 20"
                                  fill="currentColor"
                              >
                                  <path
                                      fill-rule="evenodd"
                                      d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                      clip-rule="evenodd"
                                  />
                              </svg>
                          </button>
                      </span>
                  </template>
  
                  <template #content>
                      <DropdownLink
                          :href="route('users.index')"
                          :active="route().current('users.index')"
                      >
                          Usuarios
                      </DropdownLink>
                      <DropdownLink
                          :href="route('roles.index')"
                          :active="route().current('roles.index')"
                      >
                          Roles
                      </DropdownLink>
                      <DropdownLink
                          :href="route('permissions.index')"
                          :active="route().current('permissions.index')"
                      >
                          Permisos
                      </DropdownLink>
                  </template>
              </Dropdown>
            </div> -->
      
        </div>
        </div>
  
      <div>
        <Clientes v-if="selected === '1'" :datos="clientes"></Clientes>
        <Alertas v-else-if="selected === '2'" :datos="alertas"></Alertas>
      </div>
    </AdminLayout>
</template>
  
<script setup>

  import {ref} from 'vue'
  import { onMounted, onBeforeMount } from 'vue';
  import AdminLayout from '../../../Layouts/AdminLayout.vue'; // Asegúrate de importar correctamente tu componente de layout
  import Clientes from '../../../Pages/Admin/Clients/Index.vue'; // Importa tus componentes correspondientes
  import Alertas from '../../../Pages/Admin/Alerts/Index.vue'; // Importa tus componentes correspondientes
  //
  import NavLinkAdmin from "@/Components/NavLinkAdmin.vue";
  import DropdownLink from "@/Components/DropdownLink.vue";
  import Dropdown from "@/Components/Dropdown.vue";
  //
  let clientes=ref([]);
  let alertas=ref([]);

  
  const props = defineProps({
    clientes: Array, // Definir la estructura esperada de los datos recibidos
    alertas:Array,
  });

  const options = [
    { value: '1', text: 'Clientes' },
    { value: '2', text: 'Alertas' },
  ];
  
  let selected = ref('');

  onBeforeMount(() => {
    if ( props.clientes && props.alertas ) {
    
      clientes= props.clientes;
      alertas=props.alertas;
  
    } else {

      console.error('No se recibieron datos válidos desde Inertia:', props.clientes , props.alertas);
    }
  });
  //
  onMounted(() => {
   
      console.log('Datos recibidos desde Inertia:' + clientes, alertas );
    
  });

  </script>
  
  <style>
  /* Estilos opcionales */
  </style>
  