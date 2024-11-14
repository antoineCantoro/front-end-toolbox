import { defineConfig } from 'vite';
import path from 'path';

export default defineConfig({
  root: 'sources', // Définit le répertoire source
  build: {
    outDir: path.resolve(__dirname, 'public/assets'), // Définit le dossier de sortie
    emptyOutDir: true, // Vide le dossier de sortie avant chaque build
    manifest: true,
    rollupOptions: {
      input: {
        main: path.resolve(__dirname, 'sources/scripts/app.js'),
        gradients: path.resolve(__dirname, 'sources/scripts/pages/gradients.jsx'),
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
  }
});