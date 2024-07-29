import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';

export default defineConfig({
    plugins: [
        laravel({
            input: 'resources/js/app.js',
            refresh: true, // Habilita la recarga automática para el entorno de desarrollo
        }),
        vue({
            template: {
                transformAssetUrls: {
                    base: null, // No modificar la URL base
                    includeAbsolute: false, // No incluir URLs absolutas
                },
            },
        }),
    ],
    define: {
        // Define la bandera de característica aquí para Vue.js
        '__VUE_PROD_HYDRATION_MISMATCH_DETAILS__': JSON.stringify(true),
    },
    build: {
        // Configuración para la construcción de producción
        rollupOptions: {
            // Excluir pdfmake y la imagen especificada de la optimización de dependencias
            external: ['/kingtech_logo_verde@4x.png'],
        },
        // Configura la salida de archivos
        outDir: 'public/build',
        assetsDir: 'assets',
    },
    server: {
        // Configuración del servidor de desarrollo
        host: '0.0.0.0',
        port: 5173,
        strictPort: true,
        hmr: {
            protocol: 'ws',
            host: 'walrus-app-2cwac.ondigitalocean.app', // Configura el host para HMR
        },
    },
    // optimizeDeps: {
    //     // Excluir pdfmake de la optimización de dependencias
    //     exclude: ['pdfmake'],
    // },
});
