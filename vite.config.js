import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';

export default defineConfig(({ mode }) => {
let isProduction == 'production',


    return {
        // Deja la base como '/' para que sea relativa a cualquier dominio
        base: isProduction ? '/' : '/',
        plugins: [
            laravel({
                input: ['resources/js/app.js'],
            }),
            vue({
                template: {
                    transformAssetUrls: {
                        base: null,
                        includeAbsolute: false,
                    },
                },
            }),
        ],
        server: {
            https: isProduction, // Habilitar HTTPS en producción
            host: '0.0.0.0', // Permitir acceso externo
            port: 5173,
        },
        define: {
            '__VUE_PROD_HYDRATION_MISMATCH_DETAILS__': JSON.stringify(true)
        },
        build: {
            rollupOptions: {
                external: ['/kingtech_logo_verde@4x.png'],
            },
            outDir: 'public/build',
            assetsDir: 'assets',
        },
    };
});
