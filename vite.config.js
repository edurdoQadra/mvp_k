import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';

export default defineConfig(({ mode }) => {
    const isProduction = mode === 'production';

    return {
        base: isProduction ? 'https://lobster-app-onp3b.ondigitalocean.app/' : '/', // URL base para producción
        plugins: [
            laravel({
                input: 'resources/js/app.js',
                refresh: !isProduction,  // Desactivar refresh en producción
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
            '__VUE_PROD_HYDRATION_MISMATCH_DETAILS__': isProduction ? 'false' : 'true',
        },
        optimizeDeps: {
            exclude: ['pdfmake'],
        },
        build: {
            rollupOptions: {
                external: ['kingtech_logo_verde@4x.png'],  // Puedes ajustar esto si tienes otros activos externos
            },
        },
        server: {
            host: '0.0.0.0', // Host para el servidor de desarrollo (no afecta producción)
            port: 5173,      // Puerto solo usado en desarrollo
        },
    };
});
