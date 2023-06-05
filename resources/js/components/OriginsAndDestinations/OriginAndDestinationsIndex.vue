<template>
    <div>
        <div class="md:flex md:items-center md:justify-between my-5 ">
            <div class="min-w-0 flex-1">
                <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:truncate sm:text-3xl sm:tracking-tight">Origenes y
                    Destinos</h2>
            </div>
        </div>
        <div class="border-b border-gray-200 bg-white px-4 py-5 sm:px-6  shadow sm:rounded">
            <div class="-ml-4 -mt-2 flex flex-wrap items-center justify-between sm:flex-nowrap">
                <div class="ml-4 mt-2">
                    <!-- <h3 class="text-base font-semibold leading-6 text-gray-900">Job Postings</h3> -->
                </div>
                <div class="ml-4 mt-2 flex-shrink-0">
                    <router-link :to="{ name: 'origins_and_destinations.create' }"
                        class="relative inline-flex items-center rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Crear
                        nuevo</router-link>
                </div>
            </div>

            <div class="mt-8 flow-root uppercase">
                <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">

                        <TransitionGroup name="list" tag="table" class="min-w-full divide-y divide-gray-300">
                            <thead>
                                <tr>
                                    <th scope="col" class="py-3.5 pl-4 pr-3 text-left font-semibold text-gray-900 sm:pl-0">
                                        NOMBRE
                                    </th>
                                    <th scope="col" class="px-3 py-3.5 text-left  font-semibold text-gray-900">RFC
                                    </th>
                                    <th scope="col" class="px-3 py-3.5 text-left  font-semibold text-gray-900">CP
                                    </th>
                                    <th scope="col" class="px-3 py-3.5 text-left  font-semibold text-gray-900">CIUDAD
                                    </th>
                                    <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-0">
                                        <span class="sr-only">Editar</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">

                                <tr v-for="origin_and_destintion in origins_and_destinations"
                                    :key="origin_and_destintion.id" class="transition-all">
                                    <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm  font-medium text-gray-900 sm:pl-0">
                                        {{ origin_and_destintion.name }}</td>
                                    <td class="whitespace-nowrap px-3 py-4 font-medium text-sm text-gray-900">{{
                                        origin_and_destintion.rfc }}</td>
                                    <td class="whitespace-nowrap px-3 py-4 font-medium text-sm text-gray-900">{{
                                        origin_and_destintion.postal_code }}</td>
                                    <td class="whitespace-nowrap px-3 py-4 font-medium text-sm text-gray-900">{{
                                        origin_and_destintion.city
                                    }}</td>
                                    <td
                                        class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-0">
                                        <router-link :to="{ name: 'origins_and_destinations.edit', params: { id: origin_and_destintion.id } }" href="#" class="text-indigo-600 hover:text-indigo-900 mx-5">Editar<span
                                                class="sr-only">, {{ origin_and_destintion.id }}</span></router-link>
                                        <a href="#" @click="deleteOriginAndDestination(origin_and_destintion.id)"
                                            class="font-medium text-red-600 dark:text-red-500 hover:underline">ELIMINAR</a>
                                    </td>
                                </tr>

                            </tbody>
                        </TransitionGroup>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
  
<script setup>
import useOriginsAndDestinations from '../../composables/originDestinations';
import { onMounted } from 'vue';
const { origins_and_destinations, getOriginsAndDestinations, destroyOriginAndDestination } = useOriginsAndDestinations();

onMounted(getOriginsAndDestinations());

const deleteOriginAndDestination = async (id) => {
    if (!window.confirm('Estas seguro?')) {
        return;
    }
    await destroyOriginAndDestination(id);
    await getOriginsAndDestinations();
}
</script>
<style>
.list-enter-active,
.list-leave-active {
    transition: all 0.5s ease;
}

.list-enter-from,
.list-leave-to {
    opacity: 0;
    transform: translateX(30px);
}
</style>