// import './bootstrap';

// import Alpine from 'alpinejs';

// window.Alpine = Alpine;

// Alpine.start();

import { createApp } from 'vue/dist/vue.esm-bundler.js';
import router from './router';
import OwnersIndex from './components/owners/OwnersIndex.vue'

    createApp({
    components: {
        OwnersIndex,
    }
}).use(router).mount('#app');