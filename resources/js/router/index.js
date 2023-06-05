import { createRouter, createWebHistory } from "vue-router";

import Dashboard from "../components/dashboard/dashboard.vue";

import OwnersIndex from "../components/owners/OwnersIndex.vue";
import OwnersCreate from "../components/owners/OwnersCreate.vue";
import OwnersEdit from "../components/owners/OwnersEdit.vue";
// TRAILERS
import TrailersIndex from "../components/trailers/TrailersIndex.vue";
import TrailersCreate from "../components/trailers/TrailersCreate.vue";
import TrailersEdit from "../components/trailers/TrailersEdit.vue";
import Catalogs from "../components/catalogs/Catalogs.vue";
// ROUTES
import RoutesIndex from "../components/routes/RoutesIndex.vue";
import RoutesCreate from "../components/routes/RoutesCreate.vue";
import RoutesEdit from "../components/routes/RoutesEdit.vue";

// ORIGINS AND DESTINATIONS
import OriginsAndDestinations from "../components/OriginsAndDestinations/OriginAndDestinationsIndex.vue";
import OriginsAndDestinationsCreate from '../components/OriginsAndDestinations/OriginAndDestinationsCreate.vue';
import OriginsAndDestinationsEdit from '../components/OriginsAndDestinations/OriginAndDestinationsEdit.vue';

const routes = [
    // DASHBOARD
    {
        path: "/dashboard",
        name: "dashboard.index",
        component: Dashboard,
        children: [
            // CATALOGS
            {
                path: "/catalogs",
                name: "catalogs.index",
                component: Catalogs,
            },
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
            // ROUTES
            {
                path: "/routes",
                name: "routes.index",
                component: RoutesIndex,
            },
            {
                path: "/routes/create",
                name: "routes.create",
                component: RoutesCreate,
            },
            {
                path: "/routes/:id/edit",
                name: "routes.edit",
                component: RoutesEdit,
                props: true,
            },
            // ORIGINS AND DESTINATIONS
            {
                path: "/origins-and-destinations",
                name: "origins_and_destinations.index",
                component: OriginsAndDestinations,
            },
            // ORIGINS AND DESTINATIONS
            {
                path: "/origins-and-destinations",
                name: "origins_and_destinations.create",
                component: OriginsAndDestinationsCreate,
            },
            {
                path: "/origins-and-destinations/:id/edit",
                name: "origins_and_destinations.edit",
                component: OriginsAndDestinationsEdit,
                props: true,
            },
        ],
    },
];

export default createRouter({
    history: createWebHistory(),
    routes,
});
