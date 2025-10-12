import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
    // Add this server block
    server: {
        host: 'garixpert.local',
        hmr: {
            host: 'garixpert.local',
        },
    },
});