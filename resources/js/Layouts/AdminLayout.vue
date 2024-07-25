<template>
    <div class="flex flex-col h-screen">
      <Aside :darkMode="darkMode"></Aside>
      <!-- Aside y Header dentro del contenedor principal -->
      <Header :darkMode="darkMode" @update:darkMode="darkMode = $event"></Header>
        
  
      <!-- Main ocupa el espacio restante -->
      <div class=" flex items-center justify-center bg-gray-100 rounded-lg shadow-lg">
            <main >
                <slot />
            </main>
            </div>
      </div>  
    
  </template>
  
  <script setup>
  
    import { ref } from 'vue';
    import Aside from '@/Components/Aside/AsideAdmin.vue';
    import Header from '@/Components/Header.vue';
    
    import { usePermission } from "@/composables/permissions";

    const { hasRole } = usePermission();
    const darkMode = ref(false); // Estado inicial del modo oscuro

  </script>
  