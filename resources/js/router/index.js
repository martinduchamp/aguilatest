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

// CUSTOMERS
import CustomersIndex from "../components/Customers/CustomersIndex.vue";
import CustomersCreate from "../components/Customers/CustomersCreate.vue";
import CustomersEdit from "../components/Customers/CustomersEdit.vue";

// FENCES
import FencesIndex from "../components/Fences/FencesIndex.vue";
import FencesCreate from "../components/Fences/FencesCreate.vue";
import FencesEdit from "../components/Fences/FencesEdit.vue";

// VALIDITY CONCEPTS
import ValidityConceptsIndex from "../components/ValidityConcepts/ValidityConceptsIndex.vue";
import ValidityConceptsCreate from "../components/ValidityConcepts/ValidityConceptsCreate.vue";
import ValidityConceptsEdit from "../components/ValidityConcepts/ValidityConceptsEdit.vue";

// OPERATORS
import OperatorsIndex from "../components/Operators/OperatorsIndex.vue";
import OperatorsCreate from "../components/Operators/OperatorsCreate.vue";
import OperatorsEdit from "../components/Operators/OperatorsEdit.vue";

// VEHICLES
import VehiclesIndex from "../components/Vehicles/VehicleIndex.vue";
import VehiclesCreate from "../components/Vehicles/VehicleCreate.vue";
import VehiclesEdit from "../components/Vehicles/VehicleEdit.vue";

// FEES
import FeesIndex from "../components/Fees/FeesIndex.vue";
import FeesCreate from "../components/Fees/FeeCreate.vue";
import FeesEdit from "../components/Fees/FeeEdit.vue";

import AgreementsIndex from "../components/Agreements/AgreementIndex.vue";
import AgreementsCreate from "../components/Agreements/AgreementCreate.vue";
import AgreementsEdit from "../components/Agreements/AgreementEdit.vue";

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
            // CUSTOMERS
            {
                path: "/customers",
                name: "customers.index",
                component: CustomersIndex
            },
            {
                path: "/customers",
                name: "customers.create",
                component: CustomersCreate
            },
            {
                path: "/customers/:id/edit",
                name: "customers.edit",
                component: CustomersEdit,
                props: true,
            },

            // AGREEMENTS
            {
                path: "/agreements",
                name: "agreements.index",
                component: AgreementsIndex
            },
            {
                path: "/agreements",
                name: "agreements.create",
                component: AgreementsCreate
            },
            {
                path: "/agreements/:id/edit",
                name: "agreements.edit",
                component: AgreementsEdit,
                props: true,
            },

            // OPERATORS
            {
                path: "/operators",
                name: "operators.index",
                component: OperatorsIndex
            },
            {
                path: "/operators",
                name: "operators.create",
                component: OperatorsCreate
            },
            {
                path: "/operators/:id/edit",
                name: "operators.edit",
                component: OperatorsEdit,
                props: true,
            },

             // FEES
             {
                path: "/fees",
                name: "fees.index",
                component: FeesIndex
            },
            {
                path: "/fees",
                name: "fees.create",
                component: FeesCreate
            },
            {
                path: "/fees/:id/edit",
                name: "fees.edit",
                component: FeesEdit,
                props: true,
            },
            // VEHICLES
            {
                path: "/vehicles",
                name: "vehicles.index",
                component: VehiclesIndex
            },
            {
                path: "/vehicles",
                name: "vehicles.create",
                component: VehiclesCreate
            },
            {
                path: "/vehicles/:id/edit",
                name: "vehicles.edit",
                component: VehiclesEdit,
                props: true,
            },
            // VALIDITY CONCEPTS
            {
                path: "/validity_concepts",
                name: "validity_concepts.index",
                component: ValidityConceptsIndex
            },
            {
                path: "/validity_concepts",
                name: "validity_concepts.create",
                component: ValidityConceptsCreate
            },
            {
                path: "/validity_concepts/:id/edit",
                name: "validity_concepts.edit",
                component: ValidityConceptsEdit,
                props: true,
            },
            // FENCES
            {
                path: "/fences",
                name: "fences.index",
                component: FencesIndex
            },
            {
                path: "/fences",
                name: "fences.create",
                component: FencesCreate
            },
            {
                path: "/fences/:id/edit",
                name: "fences.edit",
                component: FencesEdit,
                props: true,
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
