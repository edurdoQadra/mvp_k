<template>
    <aside  class="z-[100] fixed  bg-white dark:bg-slate-700 ">
    <div id="sidebar" class="flex flex-col absolute z-40 left-0 top-0 lg:static lg:left-auto lg:top-auto lg:translate-x-0 h-screen overflow-y-scroll lg:overflow-y-auto no-scrollbar w-64 lg:w-20 lg:sidebar-expanded:!w-64 2xl:!w-64 shrink-0 bg-white dark:bg-slate-700  p-4 transition-all duration-200 ease-in-out -translate-x-64">
    <div class="flex justify-between mb-10 pr-3 sm:px-2">
            <button class="lg:hidden text-slate-500 hover:text-slate-400"
            aria-controls="sidebar" aria-expanded="false">
            <span class="sr-only">Close sidebar</span>
            <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path d="M10.7 18.7l1.4-1.4L7.8 13H20v-2H7.8l4.3-4.3-1.4-1.4L4 12z"></path>
            </svg>
            </button>
   
    <div class="flex justify-center w-full" >
        <a href="/">
            <img src="/kingtech_logo_verde@4x.png" alt="KingTech Logo" style="width: 150px;">
        </a>
</div>
    </div>

    <div class="space-y-8">
    <div>
    <h3 class="text-xs uppercase text-slate-500 font-semibold pl-3">
    <span>•••</span>
    <span class="lg:hidden lg:sidebar-expanded:block 2xl:block">Modulos</span>
    </h3>
    <ul class="mt-3">
    <div>
    <li class="px-3 py-2 rounded-sm mb-0.5 last:mb-0 undefined">
    <a 
    class="block text-slate-200 truncate transition duration-150 hover:text-white">
    <div class="flex items-center justify-between">
    <div class="flex items-center">
    <!-- <svg class="shrink-0 h-6 w-6" viewBox="0 0 24 24">
    <path class="fill-current text-slate-600" d="M8.07 16H10V8H8.07a8 8 0 110 8z"></path>
    <path class="fill-current text-slate-400" d="M15 12L8 6v5H0v2h8v5z"></path>
    </svg> -->
    <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">

    <NavLink
    @click="verificarPermisoYAcceder"
    :href="route('king.index')"
    :active="route().current('king.index')"
    >
    ADMINISTRACION
    </NavLink>

    </span>
    </div>
    <div class="flex shrink-0 ml-2">
    <svg class="w-3 h-3 shrink-0 ml-1 fill-current text-slate-400 undefined" viewBox="0 0 12 12">
    <path d="M5.9 11.4L.5 6l1.4-1.4 4 4 4-4L11.3 6z"></path>
    </svg>
    </div>
    </div>
    </a>
    <div v-show="mostrarAdmin" class="pl-9 mt-1">
    <ul>
    <li class="mb-1 last:mb-0"><a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate" href="/signin">
    <span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Usuarios</span>
    </a></li>
    <li class="mb-1 last:mb-0"><a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate" href="/signup">
    <span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Roles</span>
    </a></li>
    <li class="mb-1 last:mb-0"><a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate" href="/reset-password">
    <span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Permisos</span>
    </a></li>
    </ul>
    </div>
    </li>
    </div>
    <div>
    <li class="px-3 py-2 rounded-sm mb-0.5 last:mb-0 undefined">
    <a 
    class="block text-slate-200 truncate transition duration-150 hover:text-white">
    <div class="flex items-center justify-between">
    <div class="flex items-center">
    <!--   <svg class="shrink-0 h-6 w-6" viewBox="0 0 24 24">
    <path class="fill-current text-slate-600" d="M8.07 16H10V8H8.07a8 8 0 110 8z"></path>
    <path class="fill-current text-slate-400" d="M15 12L8 6v5H0v2h8v5z"></path>
    </svg> --> 
    <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">
    <NavLink
    @click="verificarPermisoYAcceder"
    :href="route('atc.index')"
    :active="route().current('atc.index')"
    >
    ATC
    </NavLink>
    </span>
    </div>
    <div class="flex shrink-0 ml-2">
    <svg class="w-3 h-3 shrink-0 ml-1 fill-current text-slate-400 undefined" viewBox="0 0 12 12">
    <path d="M5.9 11.4L.5 6l1.4-1.4 4 4 4-4L11.3 6z"></path>
    </svg>
    </div>
    </div>
    </a>
    <div v-show="mostrarAtc" class="pl-9 mt-1">
    <ul>
    <li class="mb-1 last:mb-0"><a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate" href="/signup">
    <span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">clientes</span>
    </a>      
    </li>
    <li class="mb-1 last:mb-0"><a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate" href="/signup">
    <span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">clientes</span>
    </a></li>
    <li class="mb-1 last:mb-0"><a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate" href="/reset-password">
    <span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Datos Personales</span>
    </a></li>
    <li class="mb-1 last:mb-0"><a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate" href="/reset-password">
    <span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Detalles del Local</span>
    </a></li>
    </ul>
    </div>
    </li>
    </div>
    <div >
    <li class="px-3 py-2 rounded-sm mb-0.5 last:mb-0 undefined">
    <a 
    class="block text-slate-200 truncate transition duration-150 hover:text-white">
    <div class="flex items-center justify-between">
    <div class="flex items-center">
    <!-- <svg class="shrink-0 h-6 w-6" viewBox="0 0 24 24">
    <path class="fill-current text-slate-600" d="M8.07 16H10V8H8.07a8 8 0 110 8z"></path>
    <path class="fill-current text-slate-400" d="M15 12L8 6v5H0v2h8v5z"></path>
    </svg> -->
    <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">
    <NavLink
    @click="verificarPermisoYAcceder"
    :href="route('soporte.index')"
    :active="route().current('soporte.index')"
    >
    SOPORTE
    </NavLink>
    </span>
    </div>
    <div class="flex shrink-0 ml-2">
    <svg class="w-3 h-3 shrink-0 ml-1 fill-current text-slate-400 undefined" viewBox="0 0 12 12">
    <path d="M5.9 11.4L.5 6l1.4-1.4 4 4 4-4L11.3 6z"></path>
    </svg>
    </div>
    </div>
    </a>
    <div v-show="mostrarSoporte" class="pl-9 mt-1">
    <ul>
    <li class="mb-1 last:mb-0"><a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate" href="/signin">
    <span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Alertas</span>
    </a></li>
    <li class="mb-1 last:mb-0"><a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate" href="/signup">
    <span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Clíentes</span>
    </a></li>

    </ul>
    </div>
    </li>
    </div> 

    <div >    
    <li class="px-3 py-2 rounded-sm mb-0.5 last:mb-0 undefined">
    <a 
    class="block text-slate-200 truncate transition duration-150 hover:text-white">
    <div class="flex items-center justify-between">
    <div class="flex items-center">
    <!-- <svg class="shrink-0 h-6 w-6" viewBox="0 0 24 24">
    <path class="fill-current text-slate-600" d="M8.07 16H10V8H8.07a8 8 0 110 8z"></path>
    <path class="fill-current text-slate-400" d="M15 12L8 6v5H0v2h8v5z"></path>
    </svg> -->
    <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">
    <NavLink
    @click="verificarPermisoYAcceder"
    :href="route('contabilidad.index')"
    :active="route().current('contabilidad.index')"
    >
    CONTABILIDAD
    </NavLink>
    </span>
    </div>
    <div class="flex shrink-0 ml-2">
    <svg class="w-3 h-3 shrink-0 ml-1 fill-current text-slate-400 undefined" viewBox="0 0 12 12">
    <path d="M5.9 11.4L.5 6l1.4-1.4 4 4 4-4L11.3 6z"></path>
    </svg>
    </div>
    </div>
    </a>
    <div v-show="mostrarContabilidad" class="pl-9 mt-1">
    <ul>
    <li class="mb-1 last:mb-0"><a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate" href="/signin">
    <span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Transacciones</span>
    </a></li>
    <li class="mb-1 last:mb-0"><a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate" href="/signup">
    <span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Detalle Transacciones</span>
    </a></li>
    <li class="mb-1 last:mb-0"><a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate" href="/reset-password">
    <span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Utilidad</span>
    </a></li>
    </ul>
    </div>
    </li>
    </div>

    <div >    
    <li class="px-3 py-2 rounded-sm mb-0.5 last:mb-0 undefined">
    <a 
    class="block text-slate-200 truncate transition duration-150 hover:text-white">
    <div class="flex items-center justify-between">
    <div class="flex items-center">
    <!-- <svg class="shrink-0 h-6 w-6" viewBox="0 0 24 24">
    <path class="fill-current text-slate-600" d="M8.07 16H10V8H8.07a8 8 0 110 8z"></path>
    <path class="fill-current text-slate-400" d="M15 12L8 6v5H0v2h8v5z"></path>
    </svg> -->
    <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">
    <NavLink
    @click="verificarPermisoYAcceder"
    :href="route('soporte.index')"
    :active="route().current('soporte.index')"
    >
    SOPORTE
    </NavLink>
    
    </span>
    </div>
    <div class="flex shrink-0 ml-2">
    <svg class="w-3 h-3 shrink-0 ml-1 fill-current text-slate-400 undefined" viewBox="0 0 12 12">
    <path d="M5.9 11.4L.5 6l1.4-1.4 4 4 4-4L11.3 6z"></path>
    </svg>       
    </div>
    </div>
    </a>
    <div v-show="mostrarReportes" class="pl-9 mt-1">
    <ul>
    <li class="mb-1 last:mb-0"><a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate" href="/signin">
    <span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Alertas</span>
    </a></li>
    <li class="mb-1 last:mb-0"><a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate" href="/signup">
    <span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Clíentes</span>
    </a></li>

    </ul>
    </div>
    </li>
    </div>   
                              
    </ul>
    </div>
    </div>
    <div class="pt-3 lg:hidden 2xl:flex justify-end mt-auto">
    <div class="px-3 py-2">
    <button>
    <span class="sr-only">Expand / collapse sidebar</span>
    <svg class="w-6 h-6 fill-current transform rotate-180" viewBox="0 0 24 24">
    <path class="text-slate-400" d="M19.586 11l-5-5L16 4.586 23.414 12 16 19.414 14.586 18l5-5H7v-2z"></path>
    <path class="text-slate-600" d="M3 23H1V1h2z"></path>
    </svg>
    </button>
    </div>
    </div>

    </div>           
    </aside>   
</template>

<script setup>

    import { ref, watch } from 'vue';
    import NavLink from "@/Components/NavLink.vue";
    import { usePermission } from "@/composables/permissions";
    import Swal from 'sweetalert2';
    
    //
    const { hasRole } = usePermission();
    const props = defineProps(['darkMode']);


    const mostrarAdmin = ref(false);
    const mostrarRoles =ref(false);
    const mostrarPermisos=ref(false);
    const mostrarAtc=ref(false);
    const mostrarSoporte = ref(false);
    const mostrarContabilidad =ref(false);
    const mostrarReportes = ref(false);
    const darkMode = ref(false);


    watch(() => props.darkMode, (newValue) => {
    if (newValue) {
        // Cambiar estilos para modo oscuro
        document.body.classList.add('dark');
    } else {
        // Cambiar estilos para modo claro
        document.body.classList.remove('dark');
    }
    });


    // Función para mostrar la alerta con SweetAlert2
    const mostrarAlertaSinPermiso = () => {
        Swal.fire({
            icon: 'error',
            title: 'Acceso denegado',
            text: 'No tienes permisos para acceder a esta función.',
            confirmButtonText: 'Entendido'
        });
    };
    const mostrarAlerta = () => {
        Swal.fire({
            icon: 'success',
            title: 'Acceso Permitido',
            text: 'No tienes permisos para acceder a esta función.',
            confirmButtonText: 'Entendido'
        });
    };

    // Ejemplo de función que verifica permisos y muestra alerta si no tiene
    const verificarPermisoYAcceder = () => {
        if (!hasRole('admin')) { // Aquí deberías tener tu lógica para verificar permisos
            mostrarAlertaSinPermiso();
            window.location.href = '';
        }else{
            mostrarAlerta();
        }
        // Aquí colocas la lógica para redireccionar o acceder al enlace si tiene permisos
    };

</script>