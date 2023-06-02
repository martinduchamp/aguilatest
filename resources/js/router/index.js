import { createRouter, createWebHistory } from "vue-router";

import OwnersIndex from '../components/owners/OwnersIndex.vue'
import TrailersIndex from '../components/trailers/TrailersIndex.vue'
import TrailersCreate from '../components/trailers/TrailersCreate.vue'

const routes = [
    // OWNERS
    {
        path: '/dashboard',
        name: 'owners.index',
        component: OwnersIndex
    },
    // TRAILERS 
    {
        path: '/trailers',
        name: 'trailers.index',
        component: TrailersIndex
    },
    {
        path: '/trailers/create',
        name: 'trailers.create',
        component: TrailersCreate
    }
];

export default createRouter({
    history: createWebHistory(),
    routes
});