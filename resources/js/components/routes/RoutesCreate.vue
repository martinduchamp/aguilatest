<template>
    <div>
        <h1 class="my-8 text-5xl font-extrabold dark:text-white">Insertar un nueva ruta</h1>

        <form @submit.prevent="saveRoute()" class="w-full max-w-lg ">
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                        Nombre de la ruta
                    </label>
                    <input v-model="form.name" required
                        class="uppercase appearance-none block w-full bg-gray-100 text-black border  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                        id="grid-first-name" type="text" placeholder="Nombre de la ruta">
                    <!-- <p class="text-red-500 text-xs italic">Please fill out this field.</p> -->
                </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                        KILOMETROS
                    </label>
                    <input v-model="form.kilometres" required
                        class="uppercase appearance-none block w-full bg-gray-100 text-black border  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                        id="grid-first-name" type="text" placeholder="Kilometros">
                    <!-- <p class="text-red-500 text-xs italic">Please fill out this field.</p> -->
                </div>
            </div>
            <div class="flex items-center justify-between">
                <button
                    class="bg-black hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                    type="submit">
                    Guardar
                </button>
            </div>
        </form>
    </div>
</template>
<script>
import { reactive } from 'vue';
import useRoutes from '../../composables/routes';

export default {
    setup() {
        const { errors, storeRoute } = useRoutes();

        const form = reactive({
            'name': ''
        })

        const saveRoute = async () => {
            await storeRoute({ ...form });
        }

        return {
            form,
            errors,
            saveRoute
        }
    }
}
</script>