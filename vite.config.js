import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig(() => {
  const useLaravelPlugin = process.env.USE_LARAVEL_PLUGIN === '1';

  return {
    plugins: [
      ...(useLaravelPlugin
        ? [
            laravel({
              input: ['resources/css/app.css', 'resources/js/app.js'],
              refresh: true,
            }),
          ]
        : []),
    ],
  };
});
