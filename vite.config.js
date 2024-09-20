import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';

export default defineConfig(({ mode }) => {
    const isProduction = mode === 'production';

    return {
        base: isProduction ? 'https://coral-app-iuz2k.ondigitalocean.app/' : '/',
        plugins: [
            laravel({
                input: ['resources/js/app.js'],
                refresh: !isProduction,  // Recarga en caliente solo en desarrollo
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
        build: {
            rollupOptions: {
                external: ['/kingtech_logo_verde@4x.png'],
            },
            outDir: 'public/build',
            assetsDir: 'assets',
        },
    };
});
