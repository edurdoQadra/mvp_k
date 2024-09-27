import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';

export default defineConfig(({ mode }) => {
let isProduction = mode === 'production';


    return {
        // Deja la base como '/' para que sea relativa a cualquier dominio
        base: isProduction ? 'http://hammerhead-app-vecpt.ondigitalocean.app/' : '/',
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
