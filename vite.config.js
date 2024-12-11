import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import fs from 'fs';
const host = 'project-coin.eden-kl.com';

export default defineConfig({
    server: {
        host,
        hmr: { host },
        https: {
            key: fs.readFileSync(`/home/ubuntu/docker/cert/_.eden-kl.com/key.pem`),
            cert: fs.readFileSync(`/home/ubuntu/docker/cert/_.eden-kl.com/fullchain.pem`),
        },
    },
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js', 'resources/js/layout.js'],
            refresh: true,
        }),
    ],
});
