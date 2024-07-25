<script setup>
  import axios from 'axios';
  import Swal from 'sweetalert2';
  import { ref, onMounted, onBeforeMount } from 'vue';
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
    const utilidades = ref([]);
    const load = ref(false);
    const showModal = ref(false); // Variable para controlar la visibilidad del modal
    const modalTitle = ref(''); 
    const showModalEdit = ref(false); // Variable para controlar la visibilidad del modal
    const modalTitleEdit = ref(''); // Variable para almacenar el título del modal
    const filaSeleccionada = ref(false);
    const modalTitleUpload=ref(''); 
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
onBeforeMount(() => {
    utilidades.value = props.datos;
    });

onMounted(() => {
    load.value = true;
    table.value.dt.on('deselect', handleRowSelectionDelete);
    table.value.dt.on('deselect', handleRowSelection);
});


/**************************************************************************************************************** */
    const form = ref({               
        id	:'',
        codigo_sede	:'',
        plataforma_id	:'',
        juego	:'',
        periodo	:'',
        administrador	:'',
        shop	:'',
        sede_id	:'',
        razon_social:'',	
        ruc	:'',
        utilidad_bruta_100	:'',
        impuesto_12	:'',
        utilidad_impuesto:'',	
        porcentaje_base	:'',
        utilidad_neta	:'',
        total_a_depositar:'',	
        pago	:'',
        porcentaje_com_adm	:'',
        com_adm_s	:'',
        porcentaje_participacion:'',	
        documento_atribucion:'',	
        plataforma_id	:'',
        transaccion_id	:'',
        
    });
/**************************************************************************************************************** */
   const formEdit = ref({
        id	:'',
        codigo_sede	:'',
        plataforma_id	:'',
        juego	:'',
        periodo	:'',
        administrador	:'',
        shop	:'',
        sede_id	:'',
        razon_social:'',	
        ruc	:'',
        utilidad_bruta_100	:'',
        impuesto_12	:'',
        utilidad_impuesto:'',	
        porcentaje_base	:'',
        utilidad_neta	:'',
        total_a_depositar:'',	
        pago	:'',
        porcentaje_com_adm	:'',
        com_adm_s	:'',
        porcentaje_participacion:'',	
        documento_atribucion:'',	
        plataforma_id	:'',
        transaccion_id	:'',
        
    });
/**************************************************************************************************************** */
columns.value = [
  { data: null, render: function(data, type, row, meta) { return meta.row + 1; } },
  { data: 'periodo' },
  { data: 'administrador' },
  { data: 'utilidad_bruta_100' },
  { data: 'impuesto_12' },
  { data: 'utilidad_impuesto' },
  { data: 'porcentaje_base' },
  { data: 'utilidad_neta' },
  { data: 'total_a_depositar' },
  { data: 'pago' },
  { data: 'documento_atribucion' }
];

/**************************************************************************************************************** */
    buttons.value = [
    {
        title: 'Utilidad',
        extend: 'excelHtml5',
        text: '<i class="fa-solid fa-file-excel"></i> Excel',
        className: 'bg-green-500 text-white px-4 py-2 rounded my-2 hover:bg-green-600 focus:outline-none'
    },
    // {
    //     title: 'Utilidad',
    //     extend: 'pdfHtml5',
    //     text: '<i class="fa-solid fa-file-pdf"></i> PDF',
    //     className: 'bg-blue-500 text-white px-4 py-2 rounded my-2 hover:bg-blue-600 focus:outline-none'
    // },
    {
        title: 'Utilidad',
        extend: 'print',
        text: '<i class="fa-solid fa-print"></i> PRINT',
        className: 'bg-gray-800 text-white px-4 py-2 rounded my-2 hover:bg-gray-900 focus:outline-none'
    },
    {
        title: 'Utilidad',
        extend: 'copy',
        text: '<i class="fa-solid fa-copy"></i> COPY',
        className: 'bg-gray-400 text-white px-4 py-2 rounded my-2 hover:bg-gray-500 focus:outline-none'
    }
];
   
/**************************************************************************************************************** */
/******************************************Testear Nuevamente**************************************************** */
/**************************************************************************************************************** */
    const deleteCliente = () => {
        const selectedRows = table.value.dt.rows({ selected: true }).data().toArray();
        if (selectedRows.length > 0) {
            const id = selectedRows[0].id;
            const administrador = selectedRows[0].administrador;
            const alert = Swal.mixin({ buttonStyling: true });
            alert.fire({
                title: '¿Está seguro de querer borrar el registro ' + administrador+':' + id +'?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: '<i className="fa fa-solid fa-check"></i> Sí, borrar',
                cancelButtonText: '<i className="fa fa-solid fa-check"></i> Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
            // confirmation(plataforma, 'http://localhost:8000/utility' + id, '');
            confirmation(plataforma, 'https://reportes.kingtech.pe/utility' + id, '');
             
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
        
    formEdit.value.cod=selectedRowsData.cod
    formEdit.value.sistema=selectedRowsData.sistema
    formEdit.value.juego=selectedRowsData.juego
    formEdit.value.periodo=selectedRowsData.periodo
    formEdit.value.administrador=selectedRowsData.administrador
    formEdit.value.shop=selectedRowsData.shop
    formEdit.value.sede=selectedRowsData.sede
    formEdit.value.razon_social=selectedRowsData.razon_social
    formEdit.value.ruc=selectedRowsData.ruc
    formEdit.value.utilidad_bruta_100=selectedRowsData.utilidad_bruta_100
    formEdit.value.impuesto_12=selectedRowsData.impuesto_12
    formEdit.value.utilidad_impuesto=selectedRowsData.utilidad_impuesto
    formEdit.value.porcentaje_base=selectedRowsData.porcentaje_base
    formEdit.value.utilidad_neta=selectedRowsData.utilidad_neta
    formEdit.value.total_a_depositar=selectedRowsData.total_a_depositar
    formEdit.value.pago=selectedRowsData.pago
    formEdit.value.porcentaje_com_adm=selectedRowsData.porcentaje_com_adm
    formEdit.value.com_adm_s=selectedRowsData.com_adm_s
    formEdit.value.porcentaje_participacion=selectedRowsData.porcentaje_participacion
    formEdit.value.documento_atribucion=selectedRowsData.documento_atribucion
    formEdit.value.plataforma_id=selectedRowsData.plataforma_id
    formEdit.value.transaccion_id=selectedRowsData.transaccion_id

    console.log(utilidades);
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

            //  sendRequest('PUT',formEdit.value,('http://localhost:8000/utility'+id),'');
            sendRequest('PUT',formEdit.value,('https://reportes.kingtech.pe/utility/'+id),'');

        } else {
            // Si no se ha seleccionado ninguna fila, mostramos un mensaje de advertencia o manejo de la situación
            let desc = 'debe selccionar uan fila antes de poder editarla'
            show_alert(desc, 'error', '')
        }
    };
/**************************************************************************************************************** */
    const save = () => {

        console.log(form);
//  sendRequest('PUT',form.value,('http://localhost:8000/alerts'+id),'');
sendRequest('POST',form.value,('https://reportes.kingtech.pe/alerts'),'');
                   form.value.fecha
           
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

    <!-- **************************************************************************************************************************************--> 
    <div className="flex justify-center">
            <div className="w-full">
                <div className="bg-blue-400 border border-blue-400 text-blue-700 px-4 py-3 rounded relative" role="alert">
                    <div className="flex justify-around items-center"> <!-- Contenedor para los botones -->
                        <button v-if="!filaSeleccionada" data-modal-target="default-modal" @click="openModal('Crear')" data-modal-toggle="default-modal" className="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                        Crear Registro 
                        </button>
                        <button  @click="openModalEdit('Editar')" className=" btn btn-lg block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button" > 
                            <i className="fa-solid fa-circle-plus mx-1"></i>Editar Registro
                        </button>
                        <button  @click="openModalUpload('Subir Documento en Excel')" className=" btn btn-lg block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button" > 
                            <i className="fa-solid fa-circle-plus mx-1"></i>Subir Excel
                        </button>
                        <button  @click="deleteCliente()" className="btn btn-lg block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                            <i className="fa-solid fa-circle-plus mx-1"></i> Borrar Registro
                        </button>
                    </div>
                </div>
            </div>
        </div>
    <!-- **************************************************************************************************************************************-->
    <!-- *************************************************************************************************************************************-->
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
    <!-- *********************************************************************************************************************************************-->
    <!-- ********************************************************************************************************************************************-->
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
    <!-- **************************************************************************************************************************************-->         
    <!-- **************************************************************************************************************************************-->         
    <div className="flex justify-center my-3">    
        <div className="md:col-span-6 lg:col-span-6 col-span-6">   
            <div className="table-responsive my-5">           
                    <DataTable 
                    :data="datos" 
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
                        <tr class="bg-gray-100">
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Id</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Periodo</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Administrador</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Utilidad Bruta 100</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Impuesto 12</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Utilidad Impuesto</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Porcentaje Base</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Utilidad Neta</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total a Depositar</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Pago</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Documento Atribucion</th>
                        </tr>
                    </thead>
                    </DataTable>                                      
            </div>
         </div>
    </div>
    <!-- **************************************************************************************************************************************-->
    <!-- MODAL EDIT  -->
    <div v-show="showModalEdit" id="default-modal" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 overflow-y-auto">
    <div class="bg-white rounded-lg shadow-lg max-w-md w-full h-full overflow-y-auto">
    <!-- Modal header -->
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
    <!-- Modal body -->
    <div class="p-4 space-y-4 overflow-y-auto">
        <form @submit.prevent="update" classNaem="max-w-lg mx-auto border border-gray-300 p-6 my-5 rounded-lg overflow-y-auto">
            
            <div className="my-2">
                <h2 className="text-xl font-thin mb-4">Título fino</h2>
            </div>
            <div className="mb-4">
                <label for="fecha" className="block mb-1">CODIGO SEDE</label>
                <input type="text" id="fecha" className="form-input w-full" v-model="formEdit.codigo_sede">
                <p className="text-sm text-gray-500 mt-1">Ingrese codigo.</p>
            </div>
            <div className="mb-4">
                <label for="dni" className="block mb-1">PLATAFORMA </label>
                <input type="text" id="dni" className="form-input w-full" v-model="formEdit.plataforma_id">
                <p className="text-sm text-gray-500 mt-1">Ingrese sistema.</p>
            </div>
            <div className="mb-4">
                <label for="medio_de_contacto" className="block mb-1">JUEGO</label>
                <input type="text" id="medio_de_contacto" className="form-input w-full" v-model="formEdit.juego">
                <p className="text-sm text-gray-500 mt-1">Ingrese juego.</p>
            </div>
            <div className="mb-4">
                <label for="medio_de_respuesta" className="block mb-1">PERIODO</label>
                <input type="text" id="medio_de_respuesta" className="form-input w-full" v-model="formEdit.periodo">
                <p className="text-sm text-gray-500 mt-1">Ingrese periodo.</p>
            </div>
            <div className="mb-4">
                <label for="como_llego_a_la_marca" className="block mb-1">ADMINISTRADOR</label>
                <input type="text" id="como_llego_a_la_marca" className="form-input w-full" v-model="formEdit.administrador">
                <p className="text-sm text-gray-500 mt-1">Ingrese el nombre del administrador.</p>
            </div>                       
            <div className="mb-4">
                <label for="fecha" className="block mb-1">SEDE</label>
                <input type="text" id="fecha" className="form-input w-full" v-model="formEdit.sede_id">
                <p className="text-sm text-gray-500 mt-1">Ingrese sede.</p>
            </div>
            <div className="mb-4">
                <label for="tipo_negocio" className="block mb-1">INGRESE RAZON SOCIAL</label>
                <input type="text" id="tipo_negocio" className="form-input w-full" v-model="formEdit.razon_social">
                <p className="text-sm text-gray-500 mt-1">Ingrese razon social.</p>
            </div>
            <div className="mb-4">
                <label for="estado" className="block mb-1">INGRESE RUC</label>
                <input type="text" id="estado" className="form-input w-full" v-model="formEdit.ruc">
                <p className="text-sm text-gray-500 mt-1">Ingrese RUC.</p>
            </div>
            <div className="mb-4">
                <label for="respuesta_asesor" className="block mb-1">INGRESE UTILIDAD BRUTA</label>
                <input type="text" id="respuesta_asesor" className="form-input w-full" v-model="formEdit.utilidad_bruta_100">
                <p className="text-sm text-gray-500 mt-1">Ingrese utilidad bruta.</p>
            </div>
            <div className="mb-4">
                <label for="primer_contacto" className="block mb-1">PRIMER CONTACTO</label>
                <input type="text" id="primer_contacto" className="form-input w-full" v-model="formEdit.impuesto_12">
                <p className="text-sm text-gray-500 mt-1">Ingrese primer contacto.</p>
            </div>
            <div className="mb-4">
                <label for="segundo_contacto" className="block mb-1">SEGUNDO CONTACTO</label>
                <input type="text" id="segundo_contacto" className="form-input w-full" v-model="formEdit.utilidad_impuesto">
                <p className="text-sm text-gray-500 mt-1">Ingrese segundo contacto.</p>
            </div>
            <div className="mb-4">
                <label for="tercer_contacto" className="block mb-1">TERCER CONTACTO</label>
                <input type="text" id="tercer_contacto" className="form-input w-full" v-model="formEdit.porcentaje_base">
                <p className="text-sm text-gray-500 mt-1">Ingrese tercer contacto.</p>
            </div>                                   
            <div className="mb-4">
                <label for="realizo_la_venta" className="block mb-1">¿REALIZO LA VENTA?</label>
                <input type="text" id="realizo_la_venta" className="form-input w-full" v-model="formEdit.utilidad_neta">
                <p className="text-sm text-gray-500 mt-1">Ingrese conclusión de venta.</p>
            </div>
            <div className="mb-4">
                <label for="futuro_socio" className="block mb-1">¿FUTURO SOCIO?</label>
                <input type="text" id="futuro_socio" className="form-input w-full" v-model="formEdit.futuro_socio">
                <p className="text-sm text-gray-500 mt-1">¿es futuro socio?.</p>
            </div>
            <div className="mb-4">
                <label for="estado" className="block mb-1">TOTAL A DEPOSITAR</label>
                <input type="text" id="estado" className="form-input w-full" v-model="formEdit.total_a_depositar">
                <p className="text-sm text-gray-500 mt-1">Ingrese el nombre del administrador.</p>
            </div>
            <div className="mb-4">
                <label for="respuesta_asesor" className="block mb-1">PAGO</label>
                <input type="text" id="respuesta_asesor" className="form-input w-full" v-model="formEdit.pago">
                <p className="text-sm text-gray-500 mt-1">Ingrese el pago.</p>
            </div>
            <div className="mb-4">
                <label for="primer_contacto" className="block mb-1">% COMISION ADMIN</label>
                <input type="text" id="primer_contacto" className="form-input w-full" v-model="formEdit.porcentaje_com_adm">
                <p className="text-sm text-gray-500 mt-1">Ingrese % comisión admin.</p>
            </div>
            <div className="mb-4">
                <label for="segundo_contacto" className="block mb-1">% COMISION S</label>
                <input type="text" id="segundo_contacto" className="form-input w-full" v-model="formEdit.com_adm_s">
                <p className="text-sm text-gray-500 mt-1">Ingrese % comisión s.</p>
            </div>
            <div className="mb-4">
                <label for="tercer_contacto" className="block mb-1">% PARTICIPACIÓN </label>
                <input type="text" id="tercer_contacto" className="form-input w-full" v-model="formEdit.porcentaje_participacion">
                <p className="text-sm text-gray-500 mt-1">Ingrese % participación.</p>
            </div>                                   
            <div className="mb-4">
                <label for="documento_atribucion" className="block mb-1">DOCUMENTO ATRIBUCION</label>
                <input type="text" id="documento_atribucion" className="form-input w-full" v-model="formEdit.documento_atribucion">
                <p className="text-sm text-gray-500 mt-1">Ingrese el nombre del administrador.</p>
            </div>
            <div className="mb-4">
                <label for="plataforma_id" className="block mb-1">PLATAFORMA ID</label>
                <input type="text" id="plataforma_id" className="form-input w-full" v-model="formEdit.plataforma_id">
                <p className="text-sm text-gray-500 mt-1">Ingrese plataforma.</p>
            </div>
            <div className="mb-4">
                <label for="transaccion_id" className="block mb-1">ID TRANSACCIÓN</label>
                <input type="text" id="transaccion_id" className="form-input w-full" v-model="formEdit.transaccion_id">
                <p className="text-sm text-gray-500 mt-1">Ingrese transacción id.</p>
            </div>

            <!-- Agrega los demás campos del formulario con la misma estructura -->
            <div class="flex items-center justify-end p-4 border-t">
        <button  type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5">Aceptar</button>
        <button @click="showModalEdit = false" type="button" class="ml-3 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg hover:bg-gray-100 px-5 py-2.5">Rechazar</button>
    </div>
        </form>
    </div>
    </div>
    </div>
    <!-- **************************************************************************************************************************************-->
    <!-- MODAL -->
    <div v-show="showModal" id="default-modal" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 overflow-y-auto">
    <div class="bg-white rounded-lg shadow-lg max-w-md w-full h-full overflow-y-auto">
    <!-- Modal header -->
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
    <!-- Modal body -->
    <div class="p-4 space-y-4 overflow-y-auto">
        <form @submit.prevent="save" classNaem="max-w-lg mx-auto border border-gray-300 p-6 my-5 rounded-lg overflow-y-auto">
            <div className="my-2">
                <h2 className="text-xl font-thin mb-4">Título fino</h2>
            </div>
            <div className="mb-4">
                <label for="fecha" className="block mb-1">CODIGO</label>
                <input type="text" id="fecha" className="form-input w-full" v-model="form.codigo_sede">
                <p className="text-sm text-gray-500 mt-1">Ingrese codigo.</p>
            </div>
            <div className="mb-4">
                <label for="dni" className="block mb-1">SISTEMA</label>
                <input type="text" id="dni" className="form-input w-full" v-model="form.plataforma_id">
                <p className="text-sm text-gray-500 mt-1">Ingrese sistema.</p>
            </div>
            <div className="mb-4">
                <label for="medio_de_contacto" className="block mb-1">JUEGO</label>
                <input type="text" id="medio_de_contacto" className="form-input w-full" v-model="form.juego">
                <p className="text-sm text-gray-500 mt-1">Ingrese juego.</p>
            </div>
            <div className="mb-4">
                <label for="medio_de_respuesta" className="block mb-1">PERIODO</label>
                <input type="text" id="medio_de_respuesta" className="form-input w-full" v-model="form.periodo">
                <p className="text-sm text-gray-500 mt-1">Ingrese periodo.</p>
            </div>
            <div className="mb-4">
                <label for="como_llego_a_la_marca" className="block mb-1">ADMINISTRADOR</label>
                <input type="text" id="como_llego_a_la_marca" className="form-input w-full" v-model="form.administrador">
                <p className="text-sm text-gray-500 mt-1">Ingrese el nombre del administrador.</p>
            </div>                       
            <div className="mb-4">
                <label for="fecha" className="block mb-1">SEDE</label>
                <input type="text" id="fecha" className="form-input w-full" v-model="form.sede_id">
                <p className="text-sm text-gray-500 mt-1">Ingrese sede.</p>
            </div>
            <div className="mb-4">
                <label for="tipo_negocio" className="block mb-1">INGRESE RAZON SOCIAL</label>
                <input type="text" id="tipo_negocio" className="form-input w-full" v-model="form.razon_social">
                <p className="text-sm text-gray-500 mt-1">Ingrese razon social.</p>
            </div>
            <div className="mb-4">
                <label for="estado" className="block mb-1">INGRESE RUC</label>
                <input type="text" id="estado" className="form-input w-full" v-model="form.ruc">
                <p className="text-sm text-gray-500 mt-1">Ingrese RUC.</p>
            </div>
            <div className="mb-4">
                <label for="respuesta_asesor" className="block mb-1">INGRESE UTILIDAD BRUTA</label>
                <input type="text" id="respuesta_asesor" className="form-input w-full" v-model="form.utilidad_bruta_100">
                <p className="text-sm text-gray-500 mt-1">Ingrese utilidad bruta.</p>
            </div>
            <div className="mb-4">
                <label for="primer_contacto" className="block mb-1">PRIMER CONTACTO</label>
                <input type="text" id="primer_contacto" className="form-input w-full" v-model="form.impuesto_12">
                <p className="text-sm text-gray-500 mt-1">Ingrese primer contacto.</p>
            </div>
            <div className="mb-4">
                <label for="segundo_contacto" className="block mb-1">SEGUNDO CONTACTO</label>
                <input type="text" id="segundo_contacto" className="form-input w-full" v-model="form.utilidad_impuesto">
                <p className="text-sm text-gray-500 mt-1">Ingrese segundo contacto.</p>
            </div>
            <div className="mb-4">
                <label for="tercer_contacto" className="block mb-1">TERCER CONTACTO</label>
                <input type="text" id="tercer_contacto" className="form-input w-full" v-model="form.porcentaje_base">
                <p className="text-sm text-gray-500 mt-1">Ingrese tercer contacto.</p>
            </div>                                   
            <div className="mb-4">
                <label for="realizo_la_venta" className="block mb-1">¿REALIZO LA VENTA?</label>
                <input type="text" id="realizo_la_venta" className="form-input w-full" v-model="form.utilidad_neta">
                <p className="text-sm text-gray-500 mt-1">Ingrese conclusión de venta.</p>
            </div>
            <div className="mb-4">
                <label for="futuro_socio" className="block mb-1">¿FUTURO SOCIO?</label>
                <input type="text" id="futuro_socio" className="form-input w-full" v-model="form.futuro_socio">
                <p className="text-sm text-gray-500 mt-1">¿es futuro socio?.</p>
            </div>
            <div className="mb-4">
                <label for="estado" className="block mb-1">TOTAL A DEPOSITAR</label>
                <input type="text" id="estado" className="form-input w-full" v-model="form.total_a_depositar">
                <p className="text-sm text-gray-500 mt-1">Ingrese el nombre del administrador.</p>
            </div>
            <div className="mb-4">
                <label for="respuesta_asesor" className="block mb-1">PAGO</label>
                <input type="text" id="respuesta_asesor" className="form-input w-full" v-model="form.pago">
                <p className="text-sm text-gray-500 mt-1">Ingrese el pago.</p>
            </div>
            <div className="mb-4">
                <label for="primer_contacto" className="block mb-1">% COMISION ADMIN</label>
                <input type="text" id="primer_contacto" className="form-input w-full" v-model="form.porcentaje_com_adm">
                <p className="text-sm text-gray-500 mt-1">Ingrese % comisión admin.</p>
            </div>
            <div className="mb-4">
                <label for="segundo_contacto" className="block mb-1">% COMISION S</label>
                <input type="text" id="segundo_contacto" className="form-input w-full" v-model="form.com_adm_s">
                <p className="text-sm text-gray-500 mt-1">Ingrese % comisión s.</p>
            </div>
            <div className="mb-4">
                <label for="tercer_contacto" className="block mb-1">% PARTICIPACIÓN </label>
                <input type="text" id="tercer_contacto" className="form-input w-full" v-model="form.porcentaje_participacion">
                <p className="text-sm text-gray-500 mt-1">Ingrese % participación.</p>
            </div>                                   
            <div className="mb-4">
                <label for="documento_atribucion" className="block mb-1">DOCUMENTO ATRIBUCION</label>
                <input type="text" id="documento_atribucion" className="form-input w-full" v-model="form.documento_atribucion">
                <p className="text-sm text-gray-500 mt-1">Ingrese el nombre del administrador.</p>
            </div>
            <div className="mb-4">
                <label for="plataforma_id" className="block mb-1">PLATAFORMA ID</label>
                <input type="text" id="plataforma_id" className="form-input w-full" v-model="form.plataforma_id">
                <p className="text-sm text-gray-500 mt-1">Ingrese plataforma.</p>
            </div>
            <div className="mb-4">
                <label for="transaccion_id" className="block mb-1">ID TRANSACCIÓN</label>
                <input type="text" id="transaccion_id" className="form-input w-full" v-model="form.transaccion_id">
                <p className="text-sm text-gray-500 mt-1">Ingrese transacción id.</p>
            </div>

            <!-- Agrega los demás campos del formulario con la misma estructura -->
            <div class="flex items-center justify-end p-4 border-t">
        <button  type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5">Aceptar</button>
        <button @click="showModal = false" type="button" class="ml-3 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg hover:bg-gray-100 px-5 py-2.5">Rechazar</button>
    </div>
        </form>
    </div>
    <!-- Botones de acción -->

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