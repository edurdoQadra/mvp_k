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
            external: ['/kingtech_logo_verde@4x.png'],
        },
        outDir: 'public/build',
        assetsDir: 'assets',
    },
    server: {
        host: '0.0.0.0',
        port: 5173,
        strictPort: true,
        hmr: {
            protocol: 'ws',
            host: 'your-production-domain.com',
        },
    },
});
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
