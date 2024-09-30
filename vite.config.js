import { defineConfig } from 'vite';
import vue from '@vitejs/plugin-vue';
import laravel from 'laravel-vite-plugin';

export default defineConfig(({ mode }) => {
    const isProduction = mode === 'production';

    return {
        base: isProduction ? 'https://hammerhead-app-vecpt.ondigitalocean.app/' : '/',

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
                // Opciones para Rollup
            },
            outDir: 'public/build',
            assetsDir: 'assets',
        },
        // Configuración de desarrollo
        server: {
    hmr: {
        host: 'localhost',
        port: 3000,
        },
        https: isProduction, // Use HTTPS in production
    },

    };
});
