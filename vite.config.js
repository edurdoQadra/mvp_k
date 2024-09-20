import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';

export default defineConfig(({ mode }) => {
    return {
        base: mode === 'production' ? 'https://coral-app-iuz2k.ondigitalocean.app/' : '/',
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
            https: mode === 'production', // Habilitar HTTPS en producción
            host: '0.0.0.0', // Permitir acceso externo
            port: 5173,
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
