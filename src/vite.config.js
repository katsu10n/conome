import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
  optimizeDeps: {
    include: ['frequently-used-dependencies'],
  },

  cacheDir: '.vite-cache',

  server: {
    hmr: {
      protocol: 'ws',
      host: 'localhost',
    },
    watch: {
      usePolling: true,
      interval: 1000,
    },
  },

  build: {
    sourcemap: false,
  },

  plugins: [
    laravel({
      input: ['resources/css/app.css', 'resources/js/app.js'],
      refresh: true,
    }),
  ],
});
