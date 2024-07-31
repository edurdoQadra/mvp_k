<script setup>
import { ref, onMounted } from 'vue';
import "leaflet/dist/leaflet.css";
import * as L from 'leaflet';
import AdminLayout from "@/Layouts/AdminLayout.vue";

import { Chart as ChartJS, Title, Tooltip, Legend, CategoryScale, LinearScale, BarController, BarElement } from 'chart.js';

const appUrl = ref(window.App.url);


ChartJS.register(Title, Tooltip, Legend, CategoryScale, LinearScale, BarController, BarElement);

const myChart = ref(null);
const myChart2 = ref(null);
const myChart3= ref(null);
const myChart4 = ref(null);

const initialMap = ref(null);

onMounted(()=> {
    initialMap.value = L.map('map').setView([23.8041, 90.4152], 6);
    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19, 
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(initialMap.value);
});

//

onMounted(() => {

  const ctx = myChart.value.getContext('2d');
  const ctx2 = myChart2.value.getContext('2d');
  const ctx3 = myChart3.value.getContext('2d');
  const ctx4 = myChart4.value.getContext('2d');

  new ChartJS(ctx, {
    type: 'bar',
    data: {
      labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
      datasets: [{
        label: '# of Votes',
        data: [12, 19, 3, 5, 2, 3],
        backgroundColor: [
          'rgba(255, 99, 132, 0.2)',
          'rgba(54, 162, 235, 0.2)',
          'rgba(255, 206, 86, 0.2)',
          'rgba(75, 192, 192, 0.2)',
          'rgba(153, 102, 255, 0.2)',
          'rgba(255, 159, 64, 0.2)'
        ],
        borderColor: [
          'rgba(255, 99, 132, 1)',
          'rgba(54, 162, 235, 1)',
          'rgba(255, 206, 86, 1)',
          'rgba(75, 192, 192, 1)',
          'rgba(153, 102, 255, 1)',
          'rgba(255, 159, 64, 1)'
        ],
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });
//
  new ChartJS(ctx2, {
    type: 'bar',
    data: {
      labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
      datasets: [{
        label: '# of Votes',
        data: [12, 19, 3, 5, 2, 3],
        backgroundColor: [
          'rgba(255, 99, 132, 0.2)',
          'rgba(54, 162, 235, 0.2)',
          'rgba(255, 206, 86, 0.2)',
          'rgba(75, 192, 192, 0.2)',
          'rgba(153, 102, 255, 0.2)',
          'rgba(255, 159, 64, 0.2)'
        ],
        borderColor: [
          'rgba(255, 99, 132, 1)',
          'rgba(54, 162, 235, 1)',
          'rgba(255, 206, 86, 1)',
          'rgba(75, 192, 192, 1)',
          'rgba(153, 102, 255, 1)',
          'rgba(255, 159, 64, 1)'
        ],
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });
//
new ChartJS(ctx3, {
    type: 'bar',
    data: {
      labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
      datasets: [{
        label: '# of Votes',
        data: [12, 19, 3, 5, 2, 3],
        backgroundColor: [
          'rgba(255, 99, 132, 0.2)',
          'rgba(54, 162, 235, 0.2)',
          'rgba(255, 206, 86, 0.2)',
          'rgba(75, 192, 192, 0.2)',
          'rgba(153, 102, 255, 0.2)',
          'rgba(255, 159, 64, 0.2)'
        ],
        borderColor: [
          'rgba(255, 99, 132, 1)',
          'rgba(54, 162, 235, 1)',
          'rgba(255, 206, 86, 1)',
          'rgba(75, 192, 192, 1)',
          'rgba(153, 102, 255, 1)',
          'rgba(255, 159, 64, 1)'
        ],
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });
  //
  new ChartJS(ctx4, {
    type: 'bar',
    data: {
      labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
      datasets: [{
        label: '# of Votes',
        data: [12, 19, 3, 5, 2, 3],
        backgroundColor: [
          'rgba(255, 99, 132, 0.2)',
          'rgba(54, 162, 235, 0.2)',
          'rgba(255, 206, 86, 0.2)',
          'rgba(75, 192, 192, 0.2)',
          'rgba(153, 102, 255, 0.2)',
          'rgba(255, 159, 64, 0.2)'
        ],
        borderColor: [
          'rgba(255, 99, 132, 1)',
          'rgba(54, 162, 235, 1)',
          'rgba(255, 206, 86, 1)',
          'rgba(75, 192, 192, 1)',
          'rgba(153, 102, 255, 1)',
          'rgba(255, 159, 64, 1)'
        ],
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });

});

</script>

<template>
<AdminLayout>
  <div class="flex flex-col">
      <div class="flex flex-1">
            <div class="flex-3  m-2 p-4">
                <button class="flex top-0 left-0 m-2 p-2 bg-white border rounded" style="display: flex; align-items: center;">
                    <span style="margin-right: 8px;">Plataforma</span>
                    <i class="fas fa-desktop"></i>
                </button>
            </div>

            <div class="flex-2  m-2 p-4">
              <div class="flex justify-center">
                <select class="flex top-0 left-0 m-2 p-4 bg-white border rounded" style="display: flex; align-items: center;">

                  <option value="">Elija una Sede</option>
                  <option value="opcion1">Enero</option>
                    <option value="opcion2">Febrero 2</option>
                    <option value="opcion3">Marzo 3</option>
                    <option value="opcion1">Abril 1</option>
                    <option value="opcion2">Mayo 2</option>
                    <option value="opcion3">Junio 3</option>
                    <option value="opcion1">Julio 1</option>
                    <option value="opcion2">Agosto 2</option>
                    <option value="opcion3">Septiembre 3</option>
                    <option value="opcion1">Octubre 1</option>
                    <option value="opcion2">Noviembre 2</option>
                    <option value="opcion3">Diciembre 3</option>
                </select>
            </div>
            </div>

            <div class="max-w-md mx-auto bg-secondary p-6">
                <div class="flex space-x-4 mb-4 mt-1">
                    <input type="date" id="fechaInicio" class="border-gray-300 border p-2 rounded-md flex-1">
                    <input type="date" id="fechaFin" class="border-gray-300 border p-2 rounded-md flex-1">
                </div>
                <div class="flex space-x-4 justify-center mt-1">
                    <button id="btnFiltrar" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md">Filtrar</button>
                    <button id="btnLimpiar" class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-4 py-2 rounded-md">Limpiar</button>
                </div>
            </div>

            <div class="flex-2  m-2 p-4">
              <div class="flex justify-center">
                <select class="flex top-0 left-0 m-2 p-2 bg-white border rounded" style="display: flex; align-items: center;">
                    <option value="opcion1">Enero</option>
                    <option value="opcion2">Febrero 2</option>
                    <option value="opcion3">Marzo 3</option>
                    <option value="opcion1">Abril 1</option>
                    <option value="opcion2">Mayo 2</option>
                    <option value="opcion3">Junio 3</option>
                    <option value="opcion1">Julio 1</option>
                    <option value="opcion2">Agosto 2</option>
                    <option value="opcion3">Septiembre 3</option>
                    <option value="opcion1">Octubre 1</option>
                    <option value="opcion2">Noviembre 2</option>
                    <option value="opcion3">Diciembre 3</option>
                </select>
            </div>
            </div>
      </div>
   
      <div class="flex flex-1">
        <!--  -->
            <div class="flex-1 border m-2 p-4">
              <!--  -->
              <div class="flex flex-col">
              <h3>An interactive leaflet map</h3>
              <div id="map" style="height:30vh; width: 100%;"></div>
            </div>
            <!--  -->
            </div>
            <div class="flex-1 border m-2 p-4">
              <canvas ref="myChart4"></canvas>
            </div>
        <!--  -->
      </div>

      <div class="flex flex-1">
        <div class="flex-1 border m-2 p-4">
          <!--  -->
          <canvas ref="myChart"></canvas>
          <!--  -->
        </div>
        <div class="flex-1 border m-2 p-4">
          <canvas ref="myChart2"></canvas>

        </div>
        <div class="flex-1 border m-2 p-4">
          <canvas ref="myChart3"></canvas>
        </div>
      </div>

  </div>
</AdminLayout>

</template>
