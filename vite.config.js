import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import vue from "@vitejs/plugin-vue";
import { quasar, transformAssetUrls } from "@quasar/vite-plugin";
import path from 'path';

export default defineConfig({
  build: {
    rollupOptions: {
      output: {
        manualChunks: {
          vendor1: ['vue', 'quasar', 'dayjs', 'material-design-icons-iconfont', 'vue-i18n'],
          vendor2: ['vue-echarts'],
          vendor3: ['echarts'],
          // components: [
          //   '/resources/js/pages/app/auth/Login.vue',
          //   '/resources/js/pages/app/auth/Register.vue',
          // ],
        },
      },
    },
  },
  plugins: [
    vue({
      template: { transformAssetUrls },
    }),
    // @quasar/plugin-vite options list:
    // https://github.com/quasarframework/quasar/blob/dev/vite-plugin/index.d.ts
    quasar({
      sassVariables: "/resources/css/quasar-variables.sass",
      config: {
        framework: {
          iconSet: 'material-symbols-outlined'
        }
      }
    }),
    laravel({
      input: ["resources/css/app.css", "resources/js/app.ts"],
      refresh: true,
    }),
  ],

   resolve: {
        alias: {
            '@': path.resolve(__dirname, 'resources/js'),
            'vendor': path.resolve(__dirname, 'vendor'), // <-- Baris ini penting
        },
    },
});
