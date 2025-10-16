import { defineConfig } from 'vite';
import { inputFiles } from './vite/config/input.js';
import { plugins } from './vite/config/plugins.js';

export default defineConfig({
    root: './src',
    base: './',
    build: {
        outDir: '../dist',
        emptyOutDir: true,
        rollupOptions: {
            input: inputFiles,
            output: {
                entryFileNames: 'assets/js/[name].js',
                chunkFileNames: 'assets/js/[name].js',
                assetFileNames: (assets) => {
                    if (/\.(gif|jpeg|jpg|png|svg|webp)$/.test(assets.name)) return assets.originalFileName;
                    if (/\.css$/.test(assets.name)) return 'assets/css/[name].[ext]';
                    return 'assets/[name].[ext]';
                },
            },
        },
        assetsInlineLimit: 0,
    },
    plugins,
    server: {
        port: 3000,
    },
});