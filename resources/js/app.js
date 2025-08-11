import './bootstrap';
import '../scss/app.scss';

import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { ZiggyVue } from 'ziggy-js';
import PrimeVue from 'primevue/config';
import Aura from '@primeuix/themes/aura';
import { definePreset } from '@primeuix/themes'
import Tooltip from 'primevue/tooltip';

const AuraPreset = definePreset(Aura, {
    semantic: {
        colorScheme: {
            dark: {
                surface: {
                    0: '#ffffff',
                    50: '{gray.50}',
                    100: '{gray.100}',
                    200: '{gray.100}',
                    300: '{gray.200}',
                    400: '{gray.200}',
                    500: '{gray.300}',
                    600: '{gray.500}',
                    700: '{gray.600}',
                    800: '{gray.700}',
                    900: '{gray.800}',
                    950: '{gray.900}'
                },
            }
        }
    }
});

const appName = import.meta.env.VITE_APP_NAME || 'Laravel';

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
    setup({ el, App, props, plugin }) {
        return createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ZiggyVue)
            .use(PrimeVue, {
                theme: {
                    preset: AuraPreset,
                    options: {
                        darkModeSelector: '.dark',
                    }
                }
            })
            .directive('tooltip', Tooltip)
            .mount(el);
    },
    progress: {
        color: '#4B5563',
    },
});
