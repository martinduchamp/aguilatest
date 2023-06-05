import { createRouter, createWebHistory } from "vue-router";

import Dashboard from "../components/dashboard/dashboard.vue"

import OwnersIndex from "../components/owners/OwnersIndex.vue";
import OwnersCreate from "../components/owners/OwnersCreate.vue";
import OwnersEdit from "../components/owners/OwnersEdit.vue";
import TrailersIndex from "../components/trailers/TrailersIndex.vue";
import TrailersCreate from "../components/trailers/TrailersCreate.vue";
import TrailersEdit from "../components/trailers/TrailersEdit.vue";

const routes = [
    // DASHBOARD
    {
        path: "/dashboard",
        name: "dashboard.index",
        component: Dashboard,
        children: [
            // OWNERS
            {
                path: "/owners",
                name: "owners.index",
                component: OwnersIndex,
            },
            {
                path: "/owners",
                name: "owners.create",
                component: OwnersCreate,
            },
            {
                path: "/owners/:id/edit",
                name: "owners.edit",
                component: OwnersEdit,
                props: true,
            },
            // TRAILERS
            {
                path: "/trailers",
                name: "trailers.index",
                component: TrailersIndex,
            },
            {
                path: "/trailers/create",
                name: "trailers.create",
                component: TrailersCreate,
            },
            {
                path: "/trailers/:id/edit",
                name: "trailers.edit",
                component: TrailersEdit,
                props: true,
            },
        ]
    },

];

export default createRouter({
    history: createWebHistory(),
    routes,
});
