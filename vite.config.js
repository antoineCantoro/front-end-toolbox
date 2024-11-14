import { fileURLToPath, URL } from 'node:url';
import { defineConfig } from 'vite';
import path from 'path';
import vue from '@vitejs/plugin-vue';

export default defineConfig({
  root: 'sources', // Définit le répertoire source
  build: {
    outDir: path.resolve(__dirname, 'public/assets'), // Définit le dossier de sortie
    emptyOutDir: true,
    manifest: true,
    rollupOptions: {
      input: {
        main: path.resolve(__dirname, 'sources/scripts/app.js'),
        gradients: path.resolve(__dirname, 'sources/scripts/pages/gradients/app.js'),
        styles: path.resolve(__dirname, 'sources/styles/style.css')
      },
      output: {
        entryFileNames: '[name].js',
        assetFileNames: '[name].css'
      }
    }
  },
  server: {
    port: 5173,
  },
  plugins: [
    vue(),
  ],
  resolve: {
    alias: {
      '@': fileURLToPath(new URL('./src', import.meta.url))
    },
  },
});