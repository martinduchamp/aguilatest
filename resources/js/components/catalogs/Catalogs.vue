<template>
    <div></div>
    <div class="grid grid-cols-2 gap-4 sm:grid-cols-3">
        <div v-for="catalog in catalogs" :key="catalog.name"
            class="relative flex items-center space-x-3 rounded-lg border border-gray-300 bg-white px-6 py-5 shadow-sm focus-within:ring-3 focus-within:ring-indigo-500 focus-within:ring-offset-2 hover:border-gray-400">
            <div class="flex-shrink-0">
                <component :is="catalog.icon"
                    :class="[catalog.current ? 'text-black' : 'text-black group-hover:text-white', 'h-6 w-6 shrink-0']"
                    aria-hidden="true" />
            </div>
            <router-link :to="{ name: catalog.ref }" class="focus:outline-none">
                <span class="absolute inset-0" aria-hidden="true" />
                <p class="text-sm font-medium text-gray-900">{{ catalog.name }}</p>
            </router-link>
        </div>




    </div>
</template>
  
<script setup>
import {
    TruckIcon
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
        name: 'REMOLQUES',
        icon: TruckIcon,
        ref: 'trailers.index'
    },
]
</script>