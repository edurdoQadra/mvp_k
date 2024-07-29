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
                    // Configura cómo manejar los URLs de los activos
                    base: null, // No modificar la URL base
                    includeAbsolute: false, // No incluir URLs absolutas
                },
            },
        }),
    ],
    define: {
        // Define la bandera de característica aquí
        '__VUE_PROD_HYDRATION_MISMATCH_DETAILS__': JSON.stringify(true)
    },
    optimizeDeps: {
        exclude: [ '/kingtech_logo_verde@4x.png'] // Excluir pdfmake y la imagen especificada de la optimización de dependencias
  },
  build: {
    rollupOptions: {
      external: ['/kingtech_logo_verde@4x.png'] // Declarar la imagen como externa para que Rollup no intente resolverla
    }
  }
});





























// import { defineConfig } from 'vite';
// import laravel from 'laravel-vite-plugin';
// import vue from '@vitejs/plugin-vue';

// export default defineConfig({
//     plugins: [
//         laravel({
//             input: 'resources/js/app.js',
//             refresh: true,
//         }),
//         vue(),
//     ],
//     define: {
//         '__VUE_PROD_HYDRATION_MISMATCH_DETAILS__': JSON.stringify(true)
//     },
//     optimizeDeps: {
//         exclude: ['pdfmake']  // Excluir pdfmake de la optimización de dependencias
//     }
// });





















// // import { defineConfig } from 'vite';
// // import laravel from 'laravel-vite-plugin';
// // import vue from '@vitejs/plugin-vue';

// // export default defineConfig({
// //     plugins: [
// //         laravel({
// //             input: 'resources/js/app.js',
// //             refresh: true,
// //         }),
// //         vue({
// //             template: {
// //                 transformAssetUrls: {
// //                     base: null,
// //                     includeAbsolute: false,
// //                 },
// //             },
// //         }),
// //     ],
// //     define: {
// //         // Define the feature flag here
// //         '__VUE_PROD_HYDRATION_MISMATCH_DETAILS__': JSON.stringify(true)
// //     }
// // });



// // // import { defineConfig } from 'vite';
// // // import laravel from 'laravel-vite-plugin';
// // // import vue from '@vitejs/plugin-vue';

// // // export default defineConfig({
// // //     plugins: [
// // //         laravel({
// // //             input: 'resources/js/app.js',
// // //             refresh: true,
// // //         }),
// // //         vue({
// // //             template: {
// // //                 transformAssetUrls: {
// // //                     base: null,
// // //                     includeAbsolute: false,
// // //                 },
// // //             },
// // //         }),
// // //         {
// // //             define: { // Use define to define the feature flag
// // //                 '__VUE_PROD_HYDRATION_MISMATCH_DETAILS__': JSON.stringify(true)
// // //             }
// // //         }
// // //     ],
// // // });



// // // import { defineConfig, define } from 'vite'; // Import define function from vite

// // // import laravel from 'laravel-vite-plugin';
// // // import vue from '@vitejs/plugin-vue';

// // // export default defineConfig({
// // //     plugins: [
// // //         laravel({
// // //             input: 'resources/js/app.js',
// // //             refresh: true,
// // //         }),
// // //         vue({
// // //             template: {
// // //                 transformAssetUrls: {
// // //                     base: null,
// // //                     includeAbsolute: false,
// // //                 },
// // //             },
// // //         }),
// // //         define({ // Use define to define the feature flag
// // //             '__VUE_PROD_HYDRATION_MISMATCH_DETAILS__': JSON.stringify(true)
// // //         })
// // //     ],
// // // });
