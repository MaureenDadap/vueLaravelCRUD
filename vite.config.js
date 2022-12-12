import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';
// import tailwindcss from 'tailwindcss';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 
            'resources/js/app.js'
        ],
            refresh: true,
        }),
        vue(),
        // tailwindcss(),
    ],
});
