<template  ">
    <AdminLayout>
      <div class="flex justify-center items-center h-screen">
  <div class="w-full max-w-md my-8">
    <div class="rounded-lg p-4 bg-gray-300 flex flex-col items-center">
      <label for="opciones" class="text-gray-700 font-bold mb-2 text-center">Selecciona una opción:</label>
      <select v-model="selected" id="opciones" class="border border-gray-300 p-2">
        <option value="">Selecciona una opción</option>
        <option v-for="option in options" :value="option.value" :key="option.value">{{ option.text }}</option>
      </select>
    </div>
    <div class="ml-3 my-5 w-full relative">
      <Dropdown>
        <template #trigger>
          <span class="inline-flex justify-center">
            <button type="button" class="inline-flex items-center px-5 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
              Area Administrador
              <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
              </svg>
            </button>
          </span>
        </template>
        <template #content>
          <DropdownLink :href="route('users.index')" :active="route().current('users.index')">Usuarios</DropdownLink>
          <DropdownLink :href="route('roles.index')" :active="route().current('roles.index')">Roles</DropdownLink>
          <DropdownLink :href="route('permissions.index')" :active="route().current('permissions.index')">Permisos</DropdownLink>
        </template>
      </Dropdown>
    </div>
  </div>
</div>
      <!-- Contenedor para los componentes hijos -->
      <div class="relative z-0">
        <Clientes v-if="selected === '1'" :datos="clientes"></Clientes>
        <Persons v-else-if="selected === '2'" :datos="personas"></Persons>
        <Stores v-else-if="selected === '3'" :datos="locales"></Stores>
        <StoreLocation v-else-if="selected === '4'" :datos="locationlocal"></StoreLocation>
        <Platforms v-else-if="selected === '5'" :datos="platform"></Platforms> 
        <Platformstore v-if="selected === '6'" :datos="platformsede"></Platformstore>
        <TransacitonDetails v-else-if="selected === '7'" :datos="transactiondetail"></TransacitonDetails>
        <Transactions v-else-if="selected === '8'" :datos="transaction"></Transactions>        
        <Utilitys v-else-if="selected === '9'" :datos="utility"></Utilitys>        
        <Partner v-else-if="selected === '10'" :datos="socios"></Partner>        
      </div>
    </AdminLayout>
  </template>
  
    
    <script setup>
    import {ref} from 'vue'
    import { onMounted, onBeforeMount } from 'vue';
   // import NavLinkAdmin from "@/Components/NavLinkAdmin.vue";
    import DropdownLink from "@/Components/DropdownLink.vue";    
    import Dropdown from "@/Components/Dropdown.vue";
  
  // Agregar este componente relacionado al tabla : ( plataformas_sede ) 
  import AdminLayout from '../../../Layouts/AdminLayout.vue'; // Asegúrate de importar correctamente tu componente de layout

  import Clientes from '../../../Pages/Admin/Clients/Index.vue'; // Importa tus componentes correspondientes
  import Persons from '../../../Pages/Admin/Persons/Index.vue'; // Importa tus componentes correspondientes
  import Platforms from '../../../Pages/Admin/Platforms/Index.vue';
  import Platformstore from '../../../Pages/Admin/Platformstore/Index.vue'; // Importa tus componentes correspondientes
  import StoreLocation from '../../../Pages/Admin/StoreLocation/Index.vue'; // Importa tus componentes correspondientes
  import Stores from '../../../Pages/Admin/Stores/Index.vue'; // Importa tus componentes correspondientes
  import TransacitonDetails from '../../../Pages/Admin/TransacitonDetails/Index.vue';
  import Transactions from '../../../Pages/Admin/Transactions/Index.vue';
  import Utilitys from '../../../Pages/Admin/Utilitys/Index.vue';
  import Partner from '../../../Pages/Admin/Partner/Index.vue';

let    clientes= ref([]);
let    personas = ref([]);
let    locales = ref([]);
let    locationlocal  = ref([]);//Definir la estructura esperada de los datos recibidos
let    platform = ref([]);
let    platformsede = ref([]);
let    transaction = ref([]);
let    transactiondetail = ref([]); //Definir la estructura esperada de los datos recibidos
let    utility = ref([]);
let socios = ref([]);

    const props = defineProps({
      clientes:Array,
      personas:Array,
      locales:Array,
      locationlocal: Array,  //Definir la estructura esperada de los datos recibidos
      platform:Array,
      platformsede:Array,
      transaction:Array,
      transactiondetail: Array,  //Definir la estructura esperada de los datos recibidos
      utility:Array,
      socios:Array,
    });

    const options = [
      { value: '1', text: 'Tabla clientes' },
      { value: '2', text: 'Tabla De personas' },
      { value: '3', text: 'Detalle locales' },
      { value: '4', text: 'Lista locacion local' },
      { value: '5', text: 'Tabla platformas' },
      { value: '6', text: 'Tabla Detalle platforma sede' },
      { value: '7', text: 'Detalle transaction' },
      { value: '8', text: 'Lista transaction detalle' },
      { value: '9', text: 'Lista utility' },
      { value: '10', text: 'Lista Socios' },
    ];
    
    let selected = ref('');

    onBeforeMount(() => {

      if (  props.clientes && props.personas && props.locales && props.locationlocal && props.platform && props.platformsede && props.transaction && props.transactiondetail && props.utility && props.socios) {

          clientes= props.clientes;
          personas =props.personas ;
          locales =props.locales ;
          locationlocal  =props.locationlocal ; //Definir la estructura esperada de los datos recibidos
          platform = props.platform;
          platformsede = props.platformsede;
          transaction = props.transaction;
          transactiondetail =props.transactiondetail ; //Definir la estructura esperada de los datos recibidos
          utility = props.utility;
          socios = props.socios;

      } else {
        
          console.error('No se recibieron datos válidos desde Inertia:');
      }
    });

    onMounted(() => {
          console.log('Datos recibidos desde Inertia clientes:', clientes );
          console.log('Datos recibidos desde Inertia personas:',  personas  );
          console.log('Datos recibidos desde Inertia locales:',  locales );
          console.log('Datos recibidos desde Inertia locationlocal:',locationlocal );
          console.log('Datos recibidos desde Inertia platform:', platform  );
          console.log('Datos recibidos desde Inertia platformsede:',  platformsede  );
          console.log('Datos recibidos desde Inertia transaction:', transaction );
          console.log('Datos recibidos desde Inertia transactiondetail:',transactiondetail );
          console.log('Datos recibidos desde Inertia utility:',utility );
    });

    </script>
    
    <style>
    /* Estilos opcionales */
    </style>
    