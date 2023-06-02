import { createRouter, createWebHistory } from "vue-router";

import OwnersIndex from '../components/owners/OwnersIndex.vue'
import OwnersCreate from '../components/owners/OwnersCreate.vue'
import OwnersEdit from '../components/owners/OwnersEdit.vue'
import TrailersIndex from '../components/trailers/TrailersIndex.vue'
import TrailersCreate from '../components/trailers/TrailersCreate.vue'

const routes = [
    // OWNERS
    {
        path: '/owners',
        name: 'owners.index',
        component: OwnersIndex
    },
    {
        path: '/owners',
        name: 'owners.create',
        component: OwnersCreate
    },
    {
        path: '/owners/:id/edit',
        name: 'owners.edit',
        component: OwnersEdit,
        props: true
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