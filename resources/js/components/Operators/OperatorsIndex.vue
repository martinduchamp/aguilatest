<template>
    <div>
        <div class="md:flex md:items-center md:justify-between my-5 ">
            <div class="min-w-0 flex-1">
                <h2 class="text-2xl font-bold leading-7 text-gray-900 dark:text-gray-200 sm:truncate sm:text-3xl sm:tracking-tight">Operadores</h2>
            </div>
        </div>
        <div class="border-b border-gray-200 dark:border-gray-800 bg-white dark:bg-gray-900 px-4 py-5 sm:px-6  shadow dark:shadow-2xl sm:rounded">
            <div class="-ml-4 -mt-2 flex flex-wrap items-center justify-between sm:flex-nowrap">
                <div class="ml-4 mt-2">
                    <!-- <h3 class="text-base font-semibold leading-6 text-gray-900">Job Postings</h3> -->
                </div>
                <div class="ml-4 mt-2 flex-shrink-0">
                    <router-link :to="{ name: 'operators.create' }"
                        class="relative inline-flex items-center rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Crear
                        nuevo</router-link>
                </div>
            </div>

            <div class="mt-8 flow-root uppercase dark:bg-gray-900">
                <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">

                        <TransitionGroup name="list" tag="table" class="min-w-full divide-y divide-gray-300 dark:dive-gray-700">
                            <thead>
                                <tr class="dark:text-white">
                                    <th scope="col" class="py-3.5 pl-4 pr-3 text-left font-semibold text-gray-900 dark:text-white sm:pl-0">
                                        NOMBRE
                                    </th>
                                    
                                    <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-0">
                                        <span class="sr-only">Editar</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 dark:divide-gray-700">

                                <tr v-for="operator in operators"
                                    :key="operator.id" class="transition-all">
                                    <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm  font-medium text-gray-900 sm:pl-0">
                                        {{ operator.name }}</td>
                                   
                                    <td
                                        class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-0">
                                        <router-link :to="{ name: 'operators.edit', params: { id: operator.id } }" href="#" class="text-indigo-600 hover:text-indigo-900 mx-5">Editar<span
                                                class="sr-only">, {{ operator.id }}</span></router-link>
                                        <a href="#" @click="deleteOperator(operator.id)"
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
import useOperators from '../../composables/operators.js';
import { onMounted } from 'vue';
const { operators, getOperators, destroyOperator } = useOperators();

onMounted(getOperators());

const deleteOperator = async (id) => {
    if (!window.confirm('Estas seguro?')) {
        return;
    }
    await destroyOperator(id);
    await getOperators();
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