import { defineConfig } from 'vite';
import path from 'path';
import autoprefixer from 'autoprefixer';

export default defineConfig(() => ({
  plugins: [],
  css: {
    devSourcemap: true,
    postcss: {
      plugins: [
        autoprefixer({}),
      ],
    },
  },
  esbuild: {
    // Drops all console and debugger statements from production build:
    drop: ['console', 'debugger'],
  },
  build: {
    emptyOutDir: false,
    outDir: './public/dist',
    assetsDir: '../assets',
    manifest: true,
    rollupOptions: {
      input: './resources/main.js',
    },
  },

  server: {
    origin: 'http://localhost:3479',
    port: '3479',
    strictPort: true,
  },

  resolve: {
    alias: {
      '@': path.resolve(__dirname, './resources'),
    },
  },
}));
