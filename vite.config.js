import { defineConfig } from 'vite';
import path from 'path';
import autoprefixer from 'autoprefixer';
import { fileURLToPath } from 'url';
import { dirname } from 'path';

const __filename = fileURLToPath(import.meta.url);
const __dirname = dirname(__filename);

const scssLogger = {
  warn(message, options) {
    // Mute "Mixed Declarations" warning
    if (options.deprecation && message.includes('mixed-decls')) {
      return;
    }
    // List all other warnings
    console.warn(`▲ [WARNING]: ${message}`);
  },
};

export default defineConfig(({ mode }) => ({
  plugins: [],
  css: {
    preprocessorOptions: {
      scss: {
        api: 'modern-compiler',
        logger: scssLogger,
        importers: [
          {
            // An importer that redirects relative URLs starting with "~" to
            // `node_modules`.
            findFileUrl(url) {
              if (url === 'theme') {
                const env = mode || 'production';
                return new URL(`./resources/scss/themes/variables.${env}.scss`, import.meta.url);
              }
              return null;
            },
          },
        ],
      },
    },
    devSourcemap: true,
    postcss: {
      plugins: [autoprefixer({})],
    },
  },
  esbuild: {
    // Drops all console and debugger statements from production build:
    drop: ['console', 'debugger'],
  },
  build: {
    emptyOutDir: false,
    outDir: './public',
    copyPublicDir: false,
    assetsDir: 'assets',
    manifest: 'manifest.json',
    rollupOptions: {
      input: './resources/main.js',
    },
  },

  server: {
    origin: 'http://localhost:3483',
    port: '3483',
    strictPort: true,
    cors: true,
  },

  resolve: {
    alias: {
      '@': path.resolve(__dirname, './resources'),
    },
  },
}));
