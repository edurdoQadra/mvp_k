import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';

export default defineConfig({
    plugins: [
        laravel({
            input: 'resources/js/app.js',
            refresh: true,
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
        '__VUE_PROD_HYDRATION_MISMATCH_DETAILS__': JSON.stringify(true)
    },
    optimizeDeps: {
        exclude: ['pdfmake']  // Excluir pdfmake de la optimización de dependencias
    },
    build: {
        rollupOptions: {
            external: ['kingtech_logo_verde@4x.png'] // Declarar la imagen como externa para que Rollup no intente resolverla
        }
    }
});
