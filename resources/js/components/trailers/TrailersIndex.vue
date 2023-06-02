<template>
    <div>
        <h1 class="my-8 text-5xl font-extrabold dark:text-white">Remolques</h1>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg bg-gray-200 dark:bg-gray-700">

            <div class="p-4">

                <div class="flex items-center justify-between">

                    <div class="relative mt-1">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <input type="text" id="table-search"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-80 pl-10 p-3  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Buscar">
                    </div>
                    <router-link :to="{ name: 'trailers.create' }"
                        class="bg-black hover:bg-gray-700 text-white font-bold py-2 px-4 rounded mx-2">
                        AGREGAR REMOLQUE
                    </router-link>
                    <!-- <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mx-2">
                        
                    </button> -->
                </div>

            </div>



            <table
                class="leading-9 uppercase hover:border-collapse border-collapse w-full bg-white dark:bg-slate-800 text-base ">
                <thead class="bg-gray-200 dark:bg-gray-700">
                    <tr>
                        <th class="w-1/2  font-bold p-4 text-slate-900 dark:text-slate-200 text-left">
                            Nombre</th>
                        <th class="w-1/2  font-semibold p-4 text-slate-900 dark:text-slate-200 text-left">
                            Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <template v-for="trailer in trailers" :key="trailer.id">
                        <!-- odd:bg-white even:bg-gray-100 dark:odd:bg-slate-900 dark:even:bg-slate-800 -->
                        <tr class="font-extrabold">
                            <td
                                class="border border-slate-300 dark:border-slate-700 p-4 text-black-500 dark:text-slate-400">
                                {{ trailer.name }}</td>
                            <td
                                class="border border-slate-300 dark:border-slate-700 p-4 text-slate-500 dark:text-slate-400">
                                <a href="#"
                                    class="font-medium text-blue-600 dark:text-red-500 hover:underline mx-3">EDITAR</a>
                                <a href="#" @click="deleteTrailer(trailer.id)" class="font-medium text-red-600 dark:text-red-500 hover:underline">ELIMINAR</a>
                            </td>
                        </tr>
                    </template>
                </tbody>
            </table>

        </div>

    </div>
</template>

<script>
import useTrailers from '../../composables/trailers';
import { onMounted } from 'vue';

export default {
    setup() {
        const { trailers, getTrailers, destroyTrailer } = useTrailers();

        onMounted(getTrailers());

        const deleteTrailer = async (id) => {
            if (!window.confirm('Estas seguro?')) {
                return;
            }
            await destroyTrailer(id);
            await getTrailers();
        }

        return {
            trailers,
            deleteTrailer,
        }
    }
}
</script>