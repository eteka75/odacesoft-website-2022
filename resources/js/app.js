require('./bootstrap');

// Import modules...
import { createApp, h } from 'vue';
import { App as InertiaApp, plugin as InertiaPlugin } from '@inertiajs/inertia-vue3';
import { InertiaProgress } from '@inertiajs/progress';

import VueMeta from 'vue-meta'
//import VueMeta from 'vue-meta';

// Ajout par eteka
import { translations } from './Mixins/translation';

const el = document.getElementById('app');

createApp({
        title: title => `${title} - My App`,
        metaInfo: {
            titleTemplate: title => (title ? `${title} - Odacesoft` : 'Odacesoft'),
        },
        render: () =>

            h(InertiaApp, {
                initialPage: JSON.parse(el.dataset.page),
                resolveComponent: (name) => require(`./Pages/${name}`).default,
            }),
    })
    .mixin({ methods: { route } })
    .mixin(translations)
    .use(InertiaPlugin)
    .mount(el);

//InertiaProgress.init({ color: '#4B5563' });
//InertiaProgress.init({ color: '#0090ff' });
InertiaProgress.init({ color: '#eadb31' });