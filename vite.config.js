export default defineConfig(({ mode }) => {
    const isProduction = mode === 'production';

    return {
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
                // Opciones para Rollup
            },
            outDir: 'public/build',
            assetsDir: 'assets',
        },

        // Configuración de desarrollo
        server: {
            hmr: !isProduction, // Deshabilitar HMR en producción
        },
    };
});
