<template>
    <div></div>
    <div class="grid grid-cols-2 gap-4 sm:grid-cols-3">
        <div v-for="catalog in catalogs" :key="catalog.name"
            class="relative flex items-center space-x-3 rounded-lg border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 px-6 py-5 shadow-sm dark:shadow-2xl focus-within:ring-3 focus-within:ring-indigo-500 focus-within:ring-offset-2 hover:border-gray-500 dark:hover:bg-gray-600">
            <div class="flex-shrink-0">
                <component :is="catalog.icon"
                    :class="[catalog.current ? 'text-black dark:text-white' : 'text-black dark:text-white group-hover:text-white', 'h-6 w-6 shrink-0']"
                    aria-hidden="true" />
            </div>
            <router-link :to="{ name: catalog.ref }" class="focus:outline-none">
                <span class="absolute inset-0" aria-hidden="true" />
                <p class="text-sm font-medium text-gray-900 dark:text-gray-200">{{ catalog.name }}</p>
            </router-link>
        </div>
    </div>
</template>
  
<script setup>
import {
    TruckIcon,
    MapIcon,
    MapPinIcon,
    UserGroupIcon,
    CubeTransparentIcon,
    DocumentIcon,
    UserIcon,
    CurrencyDollarIcon
} from '@heroicons/vue/24/outline'
const people = [


    { name: 'Lindsay Walton', title: 'Front-end Developer', email: 'lindsay.walton@example.com', role: 'Member' },
    // More people...
]
const catalogs = [
    {
        name: 'PROPIETARIOS',
        icon: TruckIcon,
        ref: 'owners.index'
    },
    {
        name: 'CLIENTES',
        icon: UserGroupIcon,
        ref: 'customers.index'
    },
    {
        name: 'REMOLQUES',
        icon: TruckIcon,
        ref: 'trailers.index'
    },
    {
        name: 'RUTAS',
        icon: MapIcon,
        ref: 'routes.index'
    },
    {
        name: 'ORIGENES Y DESTINOS',
        icon: MapPinIcon,
        ref: 'origins_and_destinations.index'
    },
    {
        name: 'CERCAS',
        icon: CubeTransparentIcon,
        ref: 'fences.index'
    },
    {
        name: 'CONCEPTOS DE VIGENCIAS PARA TRACTOR',
        icon: DocumentIcon,
        ref: 'validity_concepts.index'
    },
    {
        name: 'OPERADORES',
        icon: UserIcon,
        ref: 'operators.index'
    },
    {
        name: 'TARIFAS',
        icon: CurrencyDollarIcon,
        ref: 'fees.index'
    },
    
    // {
    //     name: 'TRACTORES',
    //     icon: TruckIcon,
    //     ref: 'vehicles.index'
    // },
]
</script>