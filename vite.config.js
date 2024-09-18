import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';

export default defineConfig(({ mode }) => {
    const isProduction = mode === 'production';

    return {
        base: isProduction ? 'https://coral-app-iuz2k.ondigitalocean.app/' : '/', // URL base para producción
        plugins: [
            laravel({
                input: ['resources/js/app.js'], // Asegúrate de pasar un array en 'input'
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
        build: {
            rollupOptions: {
                external: ['/kingtech_logo_verde@4x.png'],
            },
            outDir: 'public/build',  // Asegúrate de que esta ruta exista o esté correctamente configurada
            assetsDir: 'assets',
        },
    };
});
