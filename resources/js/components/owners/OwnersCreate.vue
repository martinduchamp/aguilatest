<template>
    <div>
        
        <form @submit.prevent="saveOwner()"
            class="bg-white shadow-sm ring-1 ring-gray-900/5 sm:rounded md:col-span-2">
            <div class="px-4 py-6 sm:p-8">
                <h1 class="my-8 text-5xl font-extrabold dark:text-white">Insertar un nuevo Propietario</h1>
                <div class="grid max-w-2xl grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

                    <div class="col-span-full">
                        <label for="owner-name" class="block text-sm font-medium leading-6 text-gray-900">NOMBRE DE
                            PROPIETARIO</label>
                        <div class="mt-2">
                            <input v-model="form.name" type="text" name="owner-name" id="owner-name"
                                autocomplete="owner-name"
                                class="block w-full rounded border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                        </div>
                    </div>

                    <div class="sm:col-span-2 sm:col-start-1">
                        <label for="city" class="block text-sm font-medium leading-6 text-gray-900">TIPOS DE
                            REMOLQUES</label>
                        <div class="mt-2">
                            <ul
                                class="w-48 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white">

                                <li v-for="trailer in trailers" :key="trailer.id"
                                    class="uppercase w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600">
                                    <div class="flex items-center pl-3">
                                        <input id="vue-checkbox" type="checkbox" :value="trailer.id" v-model="_trailerskeys"
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                        <label for="vue-checkbox"
                                            class="w-full py-3 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                            {{ trailer.name }}
                                        </label>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex items-center gap-x-6 border-t border-gray-900/10 px-4 py-4 sm:px-8">
                <button
                    class="bg-black hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                    type="submit">
                    Crear
                </button>
            </div>
        </form>


        <!-- <form @submit.prevent="saveOwner()" class="w-full max-w-lg ">
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                        Nombre de Propietario
                    </label>
                    <input v-model="form.name"
                        class="uppercase appearance-none block w-full bg-gray-100 text-black border  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                        id="grid-first-name" type="text" placeholder="Nombre de Propietario" required>
                </div>
                <div class="w-full px-3 mb-6 md:mb-0 my-8">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                        SLECCIONA LOS TIPOS DE REMOLQUES
                    </label>
                    <ul
                        class="w-48 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white">

                        <li v-for="trailer in trailers" :key="trailer.id"
                            class="uppercase w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600">
                            <div class="flex items-center pl-3">
                                <input id="vue-checkbox" type="checkbox" :value="trailer.id" v-model="_trailerskeys"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                <label for="vue-checkbox"
                                    class="w-full py-3 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                    {{ trailer.name }}
                                </label>
                            </div>
                        </li>



                    </ul>
                </div>
            </div>

            <div class="flex items-center justify-between">
                <button
                    class="bg-black hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                    type="submit">
                    Crear
                </button>
            </div>
        </form> -->
    </div>
</template>
<script>
import { reactive } from 'vue';
import { ref } from "vue";
import useOwners from '../../composables/owners';
import useTrailers from '../../composables/trailers'
import { onMounted } from 'vue';

export default {
    setup() {
        const { errors, storeOwner } = useOwners();
        const { getTrailers, trailers } = useTrailers();
        const _trailerskeys = ref([])

        const form = reactive({
            'name': '',
            'trailers': _trailerskeys
        })


        const saveOwner = async () => {
            await storeOwner({ ...form });
        }

        onMounted(getTrailers())

        return {
            form,
            errors,
            saveOwner,
            trailers,
            _trailerskeys
        }
    }
}
</script>