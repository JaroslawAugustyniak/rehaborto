import { defineConfig } from 'vite';
import { writeFileSync, rmSync, existsSync } from 'node:fs';
import { resolve } from 'node:path';

const hotFile = resolve(import.meta.dirname, 'hot');
const devUrl = 'http://localhost:5173';

// Plik "hot" informuje motyw (PHP), że działa serwer deweloperski Vite i należy ładować assety z niego
const hotFilePlugin = () => ({
  name: 'rehaborto-hot-file',
  configureServer(server) {
    server.httpServer?.once('listening', () => writeFileSync(hotFile, devUrl));
    const cleanup = () => existsSync(hotFile) && rmSync(hotFile);
    server.httpServer?.once('close', cleanup);
    process.once('SIGINT', () => { cleanup(); process.exit(); });
    process.once('SIGTERM', () => { cleanup(); process.exit(); });
  },
});

export default defineConfig(({ command }) => ({
  base: command === 'build' ? './' : '/',
  publicDir: false,
  plugins: [hotFilePlugin()],
  server: {
    host: 'localhost',
    port: 5173,
    strictPort: true,
    origin: devUrl,
    cors: true,
  },
  build: {
    outDir: 'dist',
    emptyOutDir: true,
    manifest: true,
    rollupOptions: { input: 'src/js/main.js' },
  },
}));
