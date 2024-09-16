import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';

export default defineConfig(({ mode }) => {
    return {
        plugins: [
            laravel({
                input: 'resources/js/app.js',
                refresh: mode !== 'production',  // Desactivar refresh en producción
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
            '__VUE_PROD_HYDRATION_MISMATCH_DETAILS__': mode === 'production' ? 'false' : 'true',
        },
        optimizeDeps: {
            exclude: ['pdfmake'],
        },
        build: {
            rollupOptions: {
                external: ['kingtech_logo_verde@4x.png'],
            },
        },
    };
});
