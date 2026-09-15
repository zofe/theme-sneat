import { defineConfig } from 'vite';
import { existsSync } from 'node:fs';
import { fileURLToPath } from 'node:url';

// rapyd-admin sources: next to this package while developing, in vendor/ once installed.
const rapyd = ['../rapyd-admin', './vendor/zofe/rapyd-admin']
    .map(p => fileURLToPath(new URL(p, import.meta.url)))
    .find(p => existsSync(p + '/resources/sass/rapyd-base.scss'));
if (! rapyd) throw new Error('zofe/rapyd-admin not found: run composer install');

// Same contract as the rapyd-admin build: one IIFE bundle, rapyd.js + rapyd.css
// with fixed names into public/, published by the app under vendor/themes/sneat.
const deferredPlugins = {
    name: 'rapyd-deferred-plugins',
    transform(code, id) {
        if (id.includes('livewire-sortable/dist/')) {
            return { code: `export default function () {\n${code}\n}`, map: null };
        }
    },
};

export default defineConfig({
    plugins: [deferredPlugins],
    base: './',
    publicDir: false,
    resolve: {
        alias: {
            '@rapyd': rapyd + '/resources',
            'bootstrap': rapyd + '/node_modules/bootstrap',
            'bootstrap-modbox': rapyd + '/node_modules/bootstrap-modbox',
            'tom-select': rapyd + '/node_modules/tom-select',
            'livewire-sortable': rapyd + '/node_modules/livewire-sortable',
        },
    },
    build: {
        outDir: 'public',
        emptyOutDir: false,
        manifest: false,
        sourcemap: true,
        cssCodeSplit: false,
        rollupOptions: {
            input: 'resources/js/theme.js',
            output: {
                format: 'iife',
                name: 'rapyd',
                inlineDynamicImports: true,
                entryFileNames: 'rapyd.js',
                assetFileNames: ({ names = [] }) => {
                    const file = names[0] ?? '';
                    if (file.endsWith('.css')) return 'rapyd.css';
                    if (/\.(woff2?|ttf|eot|otf)$/.test(file)) return 'fonts/[name][extname]';
                    return '[name][extname]';
                },
            },
        },
    },
    css: {
        preprocessorOptions: {
            scss: { quietDeps: true, silenceDeprecations: ['import', 'global-builtin', 'color-functions', 'if-function'] },
        },
    },
});
