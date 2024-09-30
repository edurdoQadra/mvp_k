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
                // Opcional: puedes agregar aquí la configuración de SSR si es necesario
                // ssr: 'resources/js/ssr.js',
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
            '__VUE_PROD_HYDRATION_MISMATCH_DETAILS__': JSON.stringify(true),
        },

        build: {
            rollupOptions: {
                // Aquí puedes agregar configuraciones adicionales para Rollup
            },
            outDir: 'public/build', // El directorio de salida para los archivos construidos
            assetsDir: 'assets', // El directorio de los activos dentro de 'public/build'
        },

        server: {
            https: !isProduction, // HTTPS habilitado solo en desarrollo si es necesario
            // Otras configuraciones como proxy o puertos también se pueden agregar aquí
        },
    };
});
