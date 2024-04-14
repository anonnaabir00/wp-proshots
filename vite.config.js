import { defineConfig } from 'vite'
import path from 'path'
import vue from '@vitejs/plugin-vue'

export default defineConfig({
  plugins: [
    vue(),
  ],
  build: {
    minify: true,
    manifest: false,
    rollupOptions: {
      input: {
      'main': path.resolve(__dirname, 'ar_src/main.js'),
      'style': path.resolve(__dirname, 'ar_src/style.css'),
      },

        output:{
          dir: 'includes/assets',
          watch: true,
          entryFileNames: '[name].js',
          assetFileNames: '[name].[ext]',
          manualChunks: undefined,
        },

    }
  }
})