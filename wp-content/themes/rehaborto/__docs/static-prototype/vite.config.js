import { defineConfig } from 'vite';
import handlebars from 'vite-plugin-handlebars';
import { readFileSync } from 'node:fs';
import { resolve } from 'node:path';

const dataFile = resolve(import.meta.dirname, 'src/data/site.json');

// Dane czytane przy każdym renderze strony (zmiana site.json nie wymaga restartu serwera)
const readSite = () => JSON.parse(readFileSync(dataFile, 'utf-8'));

const reloadOnData = () => ({
  name: 'reload-on-site-data',
  configureServer(server) {
    server.watcher.add(dataFile);
    server.watcher.on('change', (file) => {
      if (file === dataFile) server.ws.send({ type: 'full-reload' });
    });
  },
});

export default defineConfig({
  root: '.',
  base: './',
  plugins: [
    handlebars({
      partialDirectory: resolve(import.meta.dirname, 'src/partials'),
      context: () => readSite(),
      reloadOnPartialChange: true,
    }),
    reloadOnData(),
  ],
});
