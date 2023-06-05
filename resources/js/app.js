// import './bootstrap';

// import Alpine from 'alpinejs';

// window.Alpine = Alpine;

// Alpine.start();

import { createApp } from 'vue/dist/vue.esm-bundler.js';
import router from './router';
import OwnersIndex from './components/owners/OwnersIndex.vue'
import Dashboard from "../js/components/dashboard/dashboard.vue"

    createApp({
    components: {
        Dashboard,
    }
}).use(router).directive('uppercase', {
    bind(el, _, vnode) {
      el.addEventListener('input', (e) => {
        e.target.value = e.target.value.toUpperCase()
        vnode.componentInstance.$emit('input', e.target.value.toUpperCase())
      })
    },
  }).mount('#app');