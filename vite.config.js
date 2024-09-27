import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';

export default defineConfig(({ mode }) => {
    const isProduction = mode === 'production';

    return {
        // Usa URL relativa para entornos de producción
        base: isProduction ? '/' : '/',

        plugins: [
            laravel({
                input: ['resources/js/app.js', 'resources/css/app.css'],
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
                // No external assets defined anymore
            },
            outDir: 'public/build',
            assetsDir: 'assets',
        },
    };
});
