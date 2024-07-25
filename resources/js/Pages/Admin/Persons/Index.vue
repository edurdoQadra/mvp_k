<script setup>
  import axios from 'axios';
  import Swal from 'sweetalert2';
  import { ref, onMounted, onBeforeMount, defineProps } from 'vue';
  import { sendRequest, confirmation, show_alert } from '../../../utils/functions';

  // DataTables and plugins
  import DataTable from 'datatables.net-vue3';
  import 'datatables.net-dt/css/dataTables.dataTables.css';
  import ButtonsHtml5 from 'datatables.net-buttons/js/buttons.html5';
  import 'datatables.net-buttons/js/buttons.print';
  import 'datatables.net-responsive-dt';
  import 'datatables.net-responsive-dt/css/responsive.dataTables.min.css';
  import Select from 'datatables.net-select';

  // Other components
  import Button from '@/Components/Button.vue';
  import datepicker from 'vue3-datepicker';

  // Setup DataTables
  DataTable.use(ButtonsHtml5);
  DataTable.use(Select);

    const props = defineProps({
    datos: Array,
    });

    const table=ref();
    const columns =ref([]);
    const buttons = ref([]);
    const personas = ref([]);
    const load = ref(false);
    const showModal = ref(false);              // Variable para controlar la visibilidad del modal
    const modalTitle = ref(''); 
    const showModalEdit = ref(false);          // Variable para controlar la visibilidad del modal
    const modalTitleEdit = ref('');            // Variable para almacenar el título del modal
    const filaSeleccionada = ref(false);
    const modalTitleUpload= ref(''); 
    const selectedDate = ref(new Date());
     const startDate = ref(new Date());
     const endDate = ref(new Date());

    const showModalUpload = ref(false);

    const openModalUpload = (title) => 
    {      
    modalTitleUpload.value = title;
    showModalUpload.value = true;  
    console.log('mensjae de exito');            
    };
    
/**************************************************************************************************************** */
/**************************************************************************************************************** */

    onMounted(() => {
       //load.value=true;
        table.value.dt.on('deselect', handleRowSelectionDelete);
        table.value.dt.on('deselect', handleRowSelection);
    });

    onBeforeMount(() => {
        personas.value = props.datos;
        console.log(personas.value);
    });

/**************************************************************************************************************** */

    const form = ref({
        id:'',
        fecha:'',
        departamento:'',
        codigo:'',
        provincia:'',
        distrito:'',
        direccion:'',
        celular:'',
        ruc:'',
        razon_social:'',
        correo:'',
    });
    
/**************************************************************************************************************** */
    const formEdit = ref({
        id:'',
        fecha:'',
        departamento:'',
        provincia:'',
        distrito:'',
        direccion:'',
        celular:'',
        ruc:'',
        razon_social:'',
        correo:'',
    });
    
    

    DataTable.use(ButtonsHtml5);
    DataTable.use(Select);

/**************************************************************************************************************** */
columns.value = [{ data:null,render:function(data,type,row,meta)
    {return (meta.row+1)}},
    {data:'dni'},
    {data:'departamento'},
    {data:'provincia'},
    {data:'distrito'},
    {data:'direccion'},
   ];
/**************************************************************************************************************** */
buttons.value = [
    {
        title: 'Persons',
        extend: 'excelHtml5',
        text: '<i class="fa-solid fa-file-excel"></i> Excel',
        class: 'bg-green-500 text-white px-4 py-2 rounded my-2 hover:bg-green-600 focus:outline-none'
    },
    // {
    //     title: 'Persons',
    //     extend: 'pdfHtml5',
    //     text: '<i class="fa-solid fa-file-pdf"></i> PDF',
    //     class: 'bg-blue-500 text-white px-4 py-2 rounded my-2 hover:bg-blue-600 focus:outline-none'
    // },
    {
        title: 'Persons',
        extend: 'print',
        text: '<i class="fa-solid fa-print"></i> PRINT',
        class: 'bg-gray-800 text-white px-4 py-2 rounded my-2 hover:bg-gray-900 focus:outline-none'
    },
    {
        title: 'Persons',
        extend: 'copy',
        text: '<i class="fa-solid fa-copy"></i> COPY',
        class: 'bg-gray-400 text-white px-4 py-2 rounded my-2 hover:bg-gray-500 focus:outline-none'
    }
];   
/**************************************************************************************************************** */
const deleteCliente = () => {
    const selectedRows = table.value.dt.rows({ selected: true }).data().toArray();
    if (selectedRows.length > 0) {
        const id = selectedRows[0].id;
        const contacto = selectedRows[0].contacto;
        const alert = Swal.mixin({ buttonStyling: true });
        alert.fire({
            title: '¿Está seguro de querer borrar el registro ' + contacto+':' + id +'?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: '<i class="fa fa-solid fa-check"></i> Sí, borrar',
            cancelButtonText: '<i class="fa fa-solid fa-check"></i> Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
   // confirmation(contacto, 'http://localhost:8000/persons' + id, '');
   confirmation(contacto, 'https://reportes.kingtech.pe/persons' + id, '');
            }
        });
    } else {
        let desc = 'Debe seleccionar una fila antes de poder borrarla';
        show_alert(desc, 'error', '');
    }
};
/**************************************************************************************************************** */
/******************************************Testear Nuevamente**************************************************** */
/**************************************************************************************************************** */
const openModal = (title) => 
{    
    form.fecha='',
    form.departamento='',
    form.codigo_cliente='',
    form.codigo_sede='',
    form.provincia='',
    form.distrito='',
    form.direccion='',
    form.celular='',
    form.ruc='',
    form.razon_social='',
    form.correo='',
    modalTitle.value = title;
    showModal.value = true;  
    console.log('mensjae de exito');            
};
/**************************************************************************************************************** */
const openModalEdit = (title) => {

    const selectedRowsCount = table.value.dt.rows({ selected: true }).count();                
    if (selectedRowsCount === 0) {
        // Mostrar una alerta si no se ha seleccionado ninguna fila
        show_alert('Debe seleccionar una fila antes de editar', 'error', '');
        return;
    }
    const selectedRowsData = table.value.dt.rows({ selected: true }).data().toArray()[0];
    if (!selectedRowsData) {
        // Mostrar una alerta si selectedRowsData es undefined
        show_alert('No se encontraron datos para la fila seleccionada', 'error', '');
        return;
    }
        
    formEdit.value.fecha=selectedRowsData.fecha,
    formEdit.departamento=selectedRowsData.fecha,
    formEdit.codigo_cliente=selectedRowsData.codigo_cliente,
    formEdit.codigo_sede=selectedRowsData.codigo_sede,
    formEdit.provincia=selectedRowsData.provincia,
    formEdit.distrito=selectedRowsData.distrito,
    formEdit.direccion=selectedRowsData.direccion,
    formEdit.celular=selectedRowsData.celular,
    formEdit.ruc=selectedRowsData.ruc,
    formEdit.razon_social=selectedRowsData.razon_social,
    formEdit.correo=selectedRowsData.correo,

    console.log(formEdit);
    modalTitleEdit.value = title;
    showModalEdit.value = true;  

};
/**************************************************************************************************************** */
const handleRowSelection = (event) => {

    const selectedRows = table.value.dt.rows({ selected: true }).count();

// Si hay filas seleccionadas, establecer filaSeleccionada en true
filaSeleccionada.value = selectedRows > 0;
};
/**************************************************************************************************************** */
const handleRowSelectionDelete = (event) => {

const selectedRows = table.value.dt.rows({ selected: true }).count();

// Si hay filas seleccionadas, establecer filaSeleccionada en true
filaSeleccionada.value = selectedRows > 0;
};
/**************************************************************************************************************** */
const update = () => {
    // Obtenemos las filas seleccionadas en la tabla
    const selectedRows = table.value.dt.rows({ selected: true }).data().toArray();        
    // Verificamos si se ha seleccionado al menos una fila

    if (selectedRows.length > 0) {
        // Obtenemos los datos de la primera fila seleccionada
        const selectedRowData = selectedRows[0];
            
        formEdit.value.fecha=selectedRowData.fecha
        formEdit.value.dni=selectedRowData.dni
        formEdit.value.medio_de_contacto=selectedRowData.medio_de_contacto
        formEdit.value.medio_de_respuesta=selectedRowData.medio_de_respuesta
        formEdit.value.como_llego_a_la_marca=selectedRowData.como_llego_a_la_marca
        formEdit.value.tipo_negocio=selectedRowData.tipo_negocio
        formEdit.value.estado=selectedRowData.estado
        formEdit.value.respuesta_asesor=selectedRowData.respuesta_asesor
        formEdit.value.primer_contacto=selectedRowData.primer_contacto
        formEdit.value.segundo_contacto=selectedRowData.segundo_contacto
        formEdit.value.tercer_contacto=selectedRowData.tercer_contacto
        formEdit.value.contacto=selectedRowData.contacto
        formEdit.value.realizo_la_venta=selectedRowData.realizo_la_venta
        formEdit.value.futuro_socio=selectedRowData.futuro_socio
        
        console.log(formEdit);
    //  sendRequest('PUT',formEdit.value,('http://localhost:8000/persons'+id),'');
    sendRequest('PUT',formEdit.value,('https://reportes.kingtech.pe/persons/'+id),'');

    } else {
        // Si no se ha seleccionado ninguna fila, mostramos un mensaje de advertencia o manejo de la situación
        let desc = 'debe selccionar uan fila antes de poder editarla'
        show_alert(desc, 'error', '')
    }
};
/**************************************************************************************************************** */
const save = () => {
    console.log(form);
  
    //  sendRequest('PUT',form.value,('http://localhost:8000/persons'+id),'');
        sendRequest('POST',form.value,('https://reportes.kingtech.pe/persons'),'');
           
  form.value.fecha = ''
    form.value.dni= ''
    form.value.medio_de_contacto= ''
    form.value.medio_de_respuesta= ''
    form.value.como_llego_a_la_marca= ''
    form.value.tipo_negocio= ''
    form.value.estado= ''
    form.value.respuesta_asesor= ''
    form.value.primer_contacto= ''
    form.value.segundo_contacto= ''
    form.value.tercer_contacto= ''
    form.value.contacto= ''
    form.value.realizo_la_venta= ''
    form.value.futuro_socio    = ''    
    showModal.value = false;

}
/*****************************************************************************************************************/
const importarArchivo = () => {
    const formData = new FormData();
    formData.append('file', fileInput.value.files[0]);

    axios.post('/api/importar-clientes', formData, {
        headers: {
        'Content-Type': 'multipart/form-data'
        }
    })
    .then(response => {
        console.log('Archivo importado correctamente:', response.data.message);
        // Puedes mostrar un mensaje de éxito o redirigir a otra página
    })
    .catch(error => {
        console.error('Error al importar archivo:', error);
    });
    };
/*****************************************************************************************************************/

</script>

<template>

        <!-- ************************************************************************************************************************************** --> 
      <div class="flex justify-center">
            <div class="w-full">
                <div class="bg-blue-400 border border-blue-400 text-blue-700 px-4 py-3 rounded relative" role="alert">
                    <div class="flex justify-around items-center"> <!-- Contenedor para los botones -->
                        <button v-if="!filaSeleccionada" data-modal-target="default-modal" @click="openModal('Crear')" data-modal-toggle="default-modal" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                        Crear Registro 
                        </button>
                        <button  @click="openModalEdit('Editar')" class=" btn btn-lg block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button" > 
                            <i class="fa-solid fa-circle-plus mx-1"></i>Editar Registro
                        </button>
                        <button  @click="openModalUpload('Subir Documento en Excel')" class=" btn btn-lg block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button" > 
                            <i class="fa-solid fa-circle-plus mx-1"></i>Subir Excel
                        </button>
                        <button  @click="deleteCliente()" class="btn btn-lg block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                            <i class="fa-solid fa-circle-plus mx-1"></i> Borrar Registro
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- ************************************************************************************************************************************** -->
         <!-- ************************************************************************************************************************************* -->
         <div class="flex justify-center my-3">
            <div class="w-full"> <!-- Utilizamos w-full para que ocupe el ancho completo -->
                <div class="bg-gray-400 border border-blue-400 text-blue-700 px-4 py-3 rounded relative" role="alert">
                <div class="flex justify-between items-center"> <!-- Flex para alinear horizontalmente y centrar verticalmente -->
                    <!-- Etiqueta del label -->
                    <label for="datepicker" class="block text-sm font-medium text-gray-700 mr-3">Selecciona una fecha</label>
                    
                    <!-- Contenedor del Datepicker y el botón -->
                    <div class="flex items-center">
                    <!-- Datepicker -->
                    <datepicker v-model="selectedDate" id="datepicker" class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    </datepicker>

                    <!-- Botón -->
                    <button
                        type="button"
                        class="ml-2 px-4 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:border-blue-700 focus:ring-blue-300"
                    >
                        Botón
                    </button>
                    </div>
                </div>
                </div>
            </div>
            </div>
            <!-- *************************************************************************************************************************************** -->

            <div class="flex justify-center my-3">
                <div class="w-full">
                    <div class="bg-gray-400 border border-blue-400 text-blue-700 px-4 py-3 rounded relative" role="alert">
                    <div class="flex justify-between items-center">
                        <label for="startDate" class="block text-sm font-medium text-gray-700 mr-3">Desde</label>
                        <datepicker v-model="startDate" id="startDate" class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"></datepicker>

                        <label for="endDate" class="block text-sm font-medium text-gray-700 ml-4 mr-3">Hasta</label>
                        <datepicker v-model="endDate" id="endDate" class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"></datepicker>

                        <button
                        type="button"
                        class="ml-4 px-4 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:border-blue-700 focus:ring-blue-300"
                        @click="filterByDates(startDate, endDate)"
                        >
                        Filtrar
                        </button>
                    </div>
                    </div>
                </div>
            </div>
            
        <!-- ************************************************************************************************************************************** -->         
        <div class="border px-10 py-5  border-primary-400 rounded-md  mt-3">    
            <div class="md:col-span-12 lg:col-span-12 col-span-12">
                
                <div class="table-responsive my-5">
                    <DataTable 
                    :data="personas" 
                    :columns="columns" 
                    ref="table"
                  class="display"
                    :options="{ 
                        select:true,
                        responsive: true, 
                        autoWidth: false, 
                        dom: 'Bfrtip',
                        buttons: buttons,
                        pageLength: 10
                    }"
                        @select="handleRowSelection"
                    >
                        <thead>
                            <tr>
                                <th class="px-4 py-2">Id</th>
                                <th class="px-4 py-2">DNI</th>
                                <th class="px-4 py-2">Departamento</th>
                                <th class="px-4 py-2">Provincia</th>
                                <th class="px-4 py-2">Distrito</th>
                                <th class="px-4 py-2">Dirección</th>
                            </tr>
                        </thead>
                    </DataTable>
                    

                    
                </div>
            </div>

        </div>
        <!-- ************************************************************************************************************************************** -->
        <!-- MODAL EDIT  -->
        <div v-show="showModalEdit" id="default-modal" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 overflow-y-auto">
            <div class="bg-white rounded-lg shadow-lg max-w-md w-full h-full overflow-y-auto">
                <div class="flex items-center justify-between p-4 border-b">
                    <h3 class="text-xl font-semibold text-gray-900">
                        {{ modalTitleEdit }}
                    </h3>
                    <button @click="showModalEdit= false" type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 flex justify-center items-center">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Cerrar Modal</span>
                    </button>
               </div>
             
               <div class="p-4 space-y-4 overflow-y-auto">
                    <form @submit.prevent="update" classNaem="max-w-lg mx-auto border border-gray-300 p-6 my-5 rounded-lg overflow-y-auto">
                        
                        <div class="my-2">
                            <h2 class="text-xl font-thin mb-4">{{ modalTitleEdit }}</h2>
                        </div>
                        <div class="mb-4">
                            <label for="dni" class="block mb-1">DNI</label>
                            <input type="text" id="dni" class="form-input w-full" v-model="formEdit.dni">
                            <p class="text-sm text-gray-500 mt-1">Ingrese dni.</p>
                        </div>
                        <div class="mb-4">
                            <label for="departamento" class="block mb-1">DEPARTAMENTO</label>
                            <input type="text" id="departamento" class="form-input w-full" v-model="formEdit.departamento">
                            <p class="text-sm text-gray-500 mt-1">Ingrese departamento.</p>
                        </div>
                        <div class="mb-4">
                            <label for="departamento" class="block mb-1">CODIGO CLIENTE</label>
                            <input type="text" id="codigo_cliente" class="form-input w-full" v-model="formEdit.codigo_cliente">
                            <p class="text-sm text-gray-500 mt-1">Ingrese departamento.</p>
                        </div>
                        <div class="mb-4">
                            <label for="departamento" class="block mb-1">CODIGO SEDE</label>
                            <input type="text" id="codigo_sede" class="form-input w-full" v-model="formEdit.codigo_sede">
                            <p class="text-sm text-gray-500 mt-1">Ingrese departamento.</p>
                        </div>
                        <div class="mb-4">
                            <label for="provincia" class="block mb-1">PROVINCIA</label>
                            <input type="text" id="provincia" class="form-input w-full" v-model="formEdit.provincia">
                            <p class="text-sm text-gray-500 mt-1">Ingrese provincia.</p>
                        </div>
                        <div class="mb-4">
                            <label for="estado" class="block mb-1">ESTADO</label>
                            <input type="text" id="estado" class="form-input w-full" v-model="formEdit.estado">
                            <p class="text-sm text-gray-500 mt-1">Ingrese estado.</p>
                        </div>
                        <div class="mb-4">
                            <label for="distrito" class="block mb-1">DISTRITO</label>
                            <input type="text" id="distrito" class="form-input w-full" v-model="formEdit.distrito">
                            <p class="text-sm text-gray-500 mt-1">Ingrese distrito.</p>
                        </div>
                        <div class="mb-4">
                            <label for="direccion" class="block mb-1">DIRECCIÓN</label>
                            <input type="text" id="direccion" class="form-input w-full" v-model="formEdit.direccion">
                            <p class="text-sm text-gray-500 mt-1">Ingrese direccion.</p>
                        </div>
                        <div class="mb-4">
                            <label for="celular" class="block mb-1">CELULAR</label>
                            <input type="text" id="celular" class="form-input w-full" v-model="formEdit.celular">
                            <p class="text-sm text-gray-500 mt-1">Ingrese celular.</p>
                        </div>
                        <div class="mb-4">
                            <label for="ruc" class="block mb-1">RUC</label>
                            <input type="text" id="ruc" class="form-input w-full" v-model="formEdit.ruc">
                            <p class="text-sm text-gray-500 mt-1">Ingrese ruc.</p>
                        </div>
                        <div class="mb-4">
                            <label for="razon_social" class="block mb-1">RAZON SOCIAL</label>
                            <input type="text" id="razon_social" class="form-input w-full" v-model="formEdit.razon_social">
                            <p class="text-sm text-gray-500 mt-1">Ingrese razon social.</p>
                        </div>
                        <div class="mb-4">
                            <label for="correo" class="block mb-1">CORREO</label>
                            <input type="text" id="correo" class="form-input w-full" v-model="formEdit.correo">
                            <p class="text-sm text-gray-500 mt-1">Ingrese correo.</p>
                        </div>
                    

                        <div class="flex items-center justify-end p-4 border-t">
                    <button  type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5">Aceptar</button>
                    <button @click="showModalEdit = false" type="button" class="ml-3 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg hover:bg-gray-100 px-5 py-2.5">Rechazar</button>
                </div>
            </form>
                </div> 
            </div>
        </div>
      
        <!-- ************************************************************************************************************************************** -->

        <!-- MODAL -->
     <div v-show="showModal" id="default-modal" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 overflow-y-auto">
            <div class="bg-white rounded-lg shadow-lg max-w-md w-full h-full overflow-y-auto">
                <div class="flex items-center justify-between p-4 border-b">
                    <h3 class="text-xl font-semibold text-gray-900">
                        {{ modalTitle }}
                    </h3>
                    <button @click="showModal = false" type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 flex justify-center items-center">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Cerrar Modal</span>
                    </button>
                </div>
                <div class="p-4 space-y-4 overflow-y-auto">
                    <form @submit.prevent="save" classNaem="max-w-lg mx-auto border border-gray-300 p-6 my-5 rounded-lg overflow-y-auto">
                          
                        <div class="my-2">
                            <h2 class="text-xl font-thin mb-4">{{ modalTitle }}</h2>
                        </div>
                        <div class="mb-4">
                            <label for="dni" class="block mb-1">DNI</label>
                            <input type="text" id="dni" class="form-input w-full" v-model="form.dni">
                            <p class="text-sm text-gray-500 mt-1">Ingrese dni.</p>
                        </div>
                        <div class="mb-4">
                            <label for="departamento" class="block mb-1">DEPARTAMENTO</label>
                            <input type="text" id="departamento" class="form-input w-full" v-model="form.departamento">
                            <p class="text-sm text-gray-500 mt-1">Ingrese departamento.</p>
                        </div>
                        <div class="mb-4">
                            <label for="departamento" class="block mb-1">CODIGO CLIENTE</label>
                            <input type="text" id="codigo_cliente" class="form-input w-full" v-model="form.codigo_cliente">
                            <p class="text-sm text-gray-500 mt-1">Ingrese departamento.</p>
                        </div>
                        <div class="mb-4">
                            <label for="departamento" class="block mb-1">CODIGO SEDE</label>
                            <input type="text" id="codigo_sede" class="form-input w-full" v-model="form.codigo_sede">
                            <p class="text-sm text-gray-500 mt-1">Ingrese departamento.</p>
                        </div>
                        <div class="mb-4">
                            <label for="provincia" class="block mb-1">PROVINCIA</label>
                            <input type="text" id="provincia" class="form-input w-full" v-model="form.provincia">
                            <p class="text-sm text-gray-500 mt-1">Ingrese provincia.</p>
                        </div>
                        <div class="mb-4">
                            <label for="estado" class="block mb-1">ESTADO</label>
                            <input type="text" id="estado" class="form-input w-full" v-model="form.estado">
                            <p class="text-sm text-gray-500 mt-1">Ingrese estado.</p>
                        </div>
                        <div class="mb-4">
                            <label for="distrito" class="block mb-1">DISTRITO</label>
                            <input type="text" id="distrito" class="form-input w-full" v-model="form.distrito">
                            <p class="text-sm text-gray-500 mt-1">Ingrese distrito.</p>
                        </div>
                        <div class="mb-4">
                            <label for="direccion" class="block mb-1">DIRECCIÓN</label>
                            <input type="text" id="direccion" class="form-input w-full" v-model="form.direccion">
                            <p class="text-sm text-gray-500 mt-1">Ingrese direccion.</p>
                        </div>
                        <div class="mb-4">
                            <label for="celular" class="block mb-1">CELULAR</label>
                            <input type="text" id="celular" class="form-input w-full" v-model="form.celular">
                            <p class="text-sm text-gray-500 mt-1">Ingrese celular.</p>
                        </div>
                        <div class="mb-4">
                            <label for="ruc" class="block mb-1">RUC</label>
                            <input type="text" id="ruc" class="form-input w-full" v-model="form.ruc">
                            <p class="text-sm text-gray-500 mt-1">Ingrese ruc.</p>
                        </div>
                        <div class="mb-4">
                            <label for="razon_social" class="block mb-1">RAZON SOCIAL</label>
                            <input type="text" id="razon_social" class="form-input w-full" v-model="form.razon_social">
                            <p class="text-sm text-gray-500 mt-1">Ingrese razon social.</p>
                        </div>
                        <div class="mb-4">
                            <label for="correo" class="block mb-1">CORREO</label>
                            <input type="text" id="correo" class="form-input w-full" v-model="form.correo">
                            <p class="text-sm text-gray-500 mt-1">Ingrese correo.</p>
                        </div>
                    

                        <div class="flex items-center justify-end p-4 border-t">
                    <button  type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5">Aceptar</button>
                    <button @click="showModalEdit = false" type="button" class="ml-3 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg hover:bg-gray-100 px-5 py-2.5">Rechazar</button>
                </div>
            </form>
                </div>
            
            </div>
        </div> 

  <!-- ************************************************************************************************************************************** -->
        <!-- MODAL UPLOAD  -->
        <div v-show="showModalUpload" id="default-modal" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 overflow-y-auto">
             <div class="bg-white rounded-lg shadow-lg max-w-md w-full h-screen-70 overflow-y-auto">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 border-b">
                    <h3 class="text-xl font-semibold text-gray-900">
                        {{ modalTitleUpload }}
                    </h3>
                    <button @click="showModalUpload = false" type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 flex justify-center items-center">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Cerrar Modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-4 space-y-4 overflow-y-auto">
                    <form @submit.prevent="importarArchivo" enctype="multipart/form-data" class="max-w-lg mx-auto border border-gray-300 p-6 my-5 rounded-lg overflow-y-auto">
                        <div class="my-2">
                            <h2 class="text-xl font-thin mb-4">{{ modalTitleUpload }}</h2>
                        </div>
                        <!-- Input para subir documentos -->
                        <div class="mb-4">
                            <label for="documento" class="block text-sm font-medium text-gray-700">Subir documento</label>
                            <input type="file" id="documento" name="documento" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        </div>
                        <!-- Agrega los demás campos del formulario con la misma estructura -->
                        <div class="flex items-center justify-end p-4 border-t">
                            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5">Subir Documento</button>
                            <button @click="showModalUpload = false" type="button" class="ml-3 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg hover:bg-gray-100 px-5 py-2.5">Rechazar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


</template>



<style>

        /* Estilos para alinear el componente de búsqueda a la derecha */
        .dt-search {
            float: right; /* Colocar el componente a la derecha */
            margin-right: 20px;
            margin-top: 1rem; /* Ajustar el margen derecho según sea necesario */

            margin-bottom: 1rem; /* Ajustar el margen derecho según sea necesario */
        }

        /* Estilos para alinear los botones de paginación a la derecha */
        .dt-paging {
            text-align: center; /* Alinear los botones a la derecha */
            margin-top: 10px; /* Ajustar el margen superior según sea necesario */
        }

        /* Estilos para los botones de paginación */
        .dt-paging-button {
            margin-left: 5px; /* Añadir un pequeño espacio entre los botones */
            /* Otros estilos según sea necesario */
        }

</style>